<?php

namespace App\Http\Controllers;

use App\Models\PullRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PullRequestController extends Controller
{
    public function index(): View
    {
        $pullRequests = PullRequest::all(); // This is not a good practice (In real project, it would be paginated)

        return view('templates.pull-request.index', compact('pullRequests'));
    }

    public function show(PullRequest $pullRequest): View|RedirectResponse
    {
        $workflow = $pullRequest->workflow_get();

        $file = Storage::disk('public')->get($workflow->getName() . '.svg');

        if (is_null($file) && !session('error')) {
            return redirect(route('pull-request.show', [
                'pullRequest' => $pullRequest->id,
            ]))->with('error', 'BMP file does not exist');
        }

        return view('templates.pull-request.show', compact('file', 'pullRequest'));
    }

    public function update(PullRequest $pullRequest, Request $request): RedirectResponse
    {
        if ($request->transition === PullRequest::EXCEPTIONAL_MARKING) {
            $pullRequest->marking = $pullRequest->initialPlace;
        } else {
            if (!$pullRequest->workflow_can($request->transition)) {
                return redirect(route('pull-request.show', [
                    'pullRequest' => $pullRequest->id,
                ]))->with('error', 'Invalid transition is invoked');
            }

            $pullRequest->workflow_apply($request->transition);
        }

        $pullRequest->save();

        return redirect()->back();
    }
}

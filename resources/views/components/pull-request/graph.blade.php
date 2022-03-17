<div id="graph-container" class="w-100">
    {!! $file !!}
</div>

<script type="text/javascript">
    let texts = document.querySelectorAll('g > text');

    for (let i = 0; i < texts.length; i++) {
        if (texts[i].textContent === '{{ $marking }}') {
            texts[i].parentElement.querySelector('ellipse').setAttribute('fill', 'orange');
        }
    }
</script>

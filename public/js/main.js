const canvasContainer = document.getElementById('canvas-container');
const canvas = document.getElementById('canvas');
const canvasValue = document.getElementById('js-canvas-file');

if (canvasContainer && canvas && canvasValue) {
    let viewer = new BpmnJS({
        container: '#canvas',
        height: 500,
    });

    let xhr = new XMLHttpRequest();
    xhr.open('get', canvasValue.value);
    xhr.send();

    xhr.onload = async () => {
        if (xhr.status === 200) {
            await viewer.importXML(xhr.response);
            viewer.get('canvas');
        } else {
            alert("{{ __('Error occurred! Looks like file is broken') }}")
        }
    }
}

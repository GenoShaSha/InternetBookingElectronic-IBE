function onReady(callback) {
    document.getElementsByTagName('body')[0].style.overflow = 'hidden'
    
    var intervalID = window.setInterval(checkReady, 1000);

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('loading', false);
    document.getElementsByTagName('body')[0].style.overflow = ''
});
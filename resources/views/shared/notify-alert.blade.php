<div id="notify-alert-wrapper">
    <div id="notify-alert" class="alert alert-success overflow-hidden">
        <div class="d-flex align-items-center">
            <p class="mb-0">{{ session("success") }}</p>
            <div class="ms-3">
                <button class="btn" onclick="hideElement(event)" sp-target="notify-alert"><i
                        class="fa-solid fa-x"></i></button>
            </div>
        </div>
        <div id="notify-loading-bar" class="sp-progress-bar"></div>
    </div>
</div>

<script>
    const timeoutDuration = 3000;

    const alertElement = document.getElementById('notify-alert');
    const loadingBar = document.getElementById('notify-loading-bar');

    anime({
        targets: '#notify-loading-bar',
        width: ['100%', '0%'],
        duration: timeoutDuration,
        easing: 'linear',
        complete: () => {
            alertElement.classList.add('sp-hidden');
        }
    })
</script>
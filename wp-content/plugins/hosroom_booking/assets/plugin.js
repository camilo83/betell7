let hosroom_booking = {
    init: function () {
        // Listen for messages sent from the iFrame
        var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
        var eventHandler = window[eventMethod];
        var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

        eventHandler(messageEvent,function(e) {
            let el = document.getElementById('hosroom_booking_iframe');
            if (e.data.indexOf('resize::') != -1) {
                var height = e.data.replace('resize::', '');
                el.style.height = height+'px';
            }
            if (e.data.indexOf('scroll::') != -1) {
                let top = e.data.replace('scroll::', '');
                const rect = el.getBoundingClientRect();
                window.scrollTo({
                    top: rect.top + window.scrollY + top,
                    left: 0,
                    behavior: 'smooth'
                });
            }
        } ,false);
        return this;
    },
    iframeLoaded: function () {
        document.getElementById('hosroom_booking').classList.add('loaded');
    }
}.init();
jQuery(document).ready(function($) {
    function applyOrReapplyStyles() {
        var powerwmodeMode = sessionStorage.getItem('powerwmodeMode');
        var isPowerwmode = powerwmodeMode === 'true';
        
        // Apply classes based on the current mode
        $('body').toggleClass('PowerWEB_css', isPowerwmode);
        toggleModeClasses(isPowerwmode);

        // Apply checkbox state
        applyCheckboxState();
    }

    function applyCheckboxState() {
        var checkboxState = sessionStorage.getItem('PowerWEB_css_toggle');
        // Default to false if not previously set
        var isCheckboxChecked = checkboxState === 'true';
        $('#PowerWEB_css-toggle').prop('checked', isCheckboxChecked);
    }

    function toggleModeClasses(isPowerwmode) {
        if (isPowerwmode) {
            $('.modehider').hide();
            $('.modevisible').css('visibility', 'visible');
            $('.modeshower').show();
            $('.modevsbl').css('opacity', '0.2');
            $('.modenovsbl').css('opacity', '1');
        } else {
            $('.modehider').show();
            $('.modevisible').css('visibility', 'hidden');
            $('.modeshower').hide();
            $('.modevsbl').css('opacity', '1');
            $('.modenovsbl').css('opacity', '0.4');
        }
    }

    // Initial application of the mode
    applyOrReapplyStyles();

    // Toggle event for the switch
    $(document).on('change', '#PowerWEB_css-toggle', function() {
        var mode = $(this).is(':checked');
        sessionStorage.setItem('powerwmodeMode', mode);
        // Save the checkbox state separately
        sessionStorage.setItem('PowerWEB_css_toggle', mode);
        applyOrReapplyStyles();
    });

    // Setup MutationObserver to watch for changes in the container where new items are loaded
    var targetNode = document.getElementsByClassName('elementor-posts-container')[0]; // Adjust this selector to target the container where new items are added
    if (targetNode) {
        var config = { childList: true, subtree: true };

        var callback = function(mutationsList, observer) {
            // Reapply styles and checkbox state whenever new nodes are added to the targetNode
            for(var mutation of mutationsList) {
                if (mutation.type === 'childList') {
                    applyOrReapplyStyles();
                    break; // Apply styles once per batch of mutations to avoid unnecessary calls
                }
            }
        };

        var observer = new MutationObserver(callback);
        observer.observe(targetNode, config);
    }
});
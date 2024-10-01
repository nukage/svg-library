jQuery(document).ready(function ($) {
    console.log('hi there');
    var clipboard = new ClipboardJS('.svg-item', {
        target: function (trigger) {
   
            return trigger.querySelector('.svg-code-input');
        }
    });

    // clipboard.on('success', function (e) {
    //     alert('SVG code copied to clipboard!');
    // });

    clipboard.on('success', function(e) {
        console.log('Action:', e.action);
        console.log('Text:', e.text);
        console.log('Trigger:', e.trigger);
    
        alert('SVG code copied to clipboard!');
        e.clearSelection();
    });
    
    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });

    
}); 
 
define([
    'jquery',
    'rjsResolver'
],function($, resolver){
    'use strict';

    const containerId = '.tasks';

    return{
        startLoader: function(){
            $(containerId).trigger('processStart');
        },
        stopLoader: function(forceStop){
            var $elem = $(containerId),
                stop= $elem.trigger.bind($elem, 'processStop');
            forceStop ? stop() : resolver(stop);
        }
    }
});

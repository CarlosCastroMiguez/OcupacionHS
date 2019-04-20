document.addEventListener('DOMContentLoaded', function() {
        
        /*
        var evt = [];
        $.ajax({
            url: "/api/prueba",
            type: "GET",
            dataType: "JSON",
            async:false
        }).done(function(r){
            evt=r;
        })
        */
            
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            locale: 'es',
            plugins: ['resourceTimeGrid', 'list'],
            timeZone: 'local',
            defaultView: 'resourceTimeGridDay',
            views: {
                listDay: {
                    buttonText: 'Lista'
                },
                resourceTimeGridDay: {
                    buttonText: 'Día'
                },
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'resourceTimeGridDay,listDay'
            },

            resources: '/api/resources/salas',
            weekends: false,
            events:'api/eventos/calendar'
            //format start: "2019-04-19T07:30:00+00:00",
        });
        

        calendar.render();
    });

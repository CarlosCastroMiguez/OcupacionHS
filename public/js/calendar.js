document.addEventListener('DOMContentLoaded', function() {
            
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            locale: 'es',
            plugins: ['resourceTimeGrid'],
            timeZone: 'local',
            defaultView: 'resourceTimeGridDay',
            views: {
                resourceTimeGridDay: {
                    buttonText: 'Día'
                },
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'resourceTimeGridDay'
            },

            resources: '/api/resources/salas',
            events:'api/eventos/calendar'
            //format start: "2019-04-19T07:30:00+00:00",
        });
        

        calendar.render();
    });

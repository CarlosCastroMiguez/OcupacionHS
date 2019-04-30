document.addEventListener('DOMContentLoaded', function () {

    
    var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear()

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        locale: 'es',
        plugins: ['resourceTimeGrid', 'interaction'],
        editable: true,
        droppable: true,
        timeZone: 'local',
        defaultView: 'resourceTimeGridDay',
        allDaySlot:false,
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
        eventDrop : function(eventDropInfo) {
            alert('ID: '+ eventDropInfo.event.id +' Titulo: '+  eventDropInfo.event.title);
        
        },

        resources: '/api/resources/salas',
        events: 'api/eventos/calendar'
        //format start: "2019-04-19T07:30:00+00:00",
    });


    calendar.render();

    var calendarEl2 = document.getElementById('calendar2');
    var calendar2 = new FullCalendar.Calendar(calendarEl2, {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        locale: 'es',
        plugins: ['resourceTimeGrid'],
        timeZone: 'local',
        defaultView: 'resourceTimeGridDay',
        allDaySlot:false,
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
        events: 'api/eventos/calendar'
        //format start: "2019-04-19T07:30:00+00:00",
    });

    calendar2.gotoDate(currentDate);


    calendar2.render();
});

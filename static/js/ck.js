$(document).ready(function(){
    // This sample still does not showcase all CKEditor&nbsp;5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

            $('.datepicker').datetimepicker({
                defaultValue: '{{ datetime|date:"Y-m-d H:i" }}',
                format: 'Y-m-d H:i',
                step: 30,
                // allowTimes: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
                // disabledDates: disabledDates
              });
    });
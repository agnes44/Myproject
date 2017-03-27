<!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min (2).js " type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datetimepicker -->
        <script src="js/plugins/bs-datetimepicker/bootstrap-datetimepicker.js"></script>
        <!--colorpicker-->
        <script src="js/bootstrap-colorpicker.min.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
        $("#test").change(function()
        {
            if($(this).prop('checked') == true)
            {
                alert("Checked Box Selected");
            }
            else
            {
                alert("Checked Box deselect");
            }
        });

            // $('input').on('ifChecked', function(event) {
            //     // var element = $(this).parent().find('input:checkbox:first');
            //     // element.parent().parent().parent().addClass('highlight');
            //     $(this).parents('li').addClass("task-done");
            //     console.log('ok');
            // });
            // $('input').on('ifUnchecked', function(event) {
            //     // var element = $(this).parent().find('input:checkbox:first');
            //     // element.parent().parent().parent().removeClass('highlight');
            //     $(this).parents('li').removeClass("task-done");
            //     console.log('not');
            // });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            

            });
            // Chart.defaults.global.responsive = true;
</script>

/<!--CRUD Todo-->
<script type ="text/javascript">

// Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#t').val($(this).data('title'));
    $('#b').val($(this).data('body'));
    $('#due').val($(this).data('due_date'));
    $('#myModal').modal('show');
});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/todo/editItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#fid").val(),
          'title': $('#t').val(),
          'body': $('#b').val(),
          'due_date': $('#due').val()
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.body + "</td><td>" + data.due_date + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-body ='" + data.body + "' data-due_date ='" + data.due_date+ "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-body ='" + data.body + "' data-due_date ='" + data.due_date + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
      }
  });
});

    // Delete
    
        $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text("  Delete ");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.id').text($(this).data('id'));
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
    });

// Delete  Todo

$('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'POST',
                url: '/todo/deleteItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $('.id').text()
                },
                success: function(data) {
                    $('.item' + $('.id').text()).remove();
                }
            });
        });

// Delete  Schedule

$('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'POST',
            url: '/schedule/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data) {
                $('.item' + $('.id').text()).remove();
            }
        });
    });

// Delete  Admin Todo

$('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'POST',
            url: '/admintodo/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data) {
                $('.item' + $('.id').text()).remove();
            }
        });
    });

// Delete  Note

$('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'POST',
            url: '/note/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data) {
                $('.item' + $('.id').text()).remove();
            }
        });
    });

$('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'POST',
            url: '/event/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data) {
                $('.item' + $('.id').text()).remove();
            }
        });
    });

$('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'POST',
            url: '/anggota/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data) {
                $('.item' + $('.id').text()).remove();
            }
        });
    });
</script>
</script>

<!--End CRUD Todo-->


<!--CRUD Schedule -->
<script type ="text/javascript">

// Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#sid').val($(this).data('id'));
    $('#judul').val($(this).data('title'));
    $('#start').val($(this).data('start'));
    $('#ends').val($(this).data('ends'));
    $('#note').val($(this).data('note'));
    $('#myModal').modal('show');
});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/schedule/ubah',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#sid").val(),
          'title': $('#judul').val(),
          'start': $('#start').val(),
          'ends': $('#ends').val(),
          'note': $('#note').val()
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.start + "</td><td>" + data.ends + "</td><td>" + data.note + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-start ='" + data.start + "' data-ends ='" + data.ends+ "'  data-note='" + data.note + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-start ='" + data.start + "' data-ends ='" + data.ends + "'  data-note='" + data.note + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
      }
  });
});
</script>

<!--End CRUD Schedule -->



<!--Start CRUD Outlines -->
<script type ="text/javascript">
// Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#tid').val($(this).data('id'));
    $('#title').val($(this).data('title'));
    $('#des').val($(this).data('body'));
    $('#myModal').modal('show');
});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/outlines/editItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#tid").val(),
          'title': $('#title').val(),
          'body': $('#des').val()
},
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.body + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
      }
  });
});
</script>
<!--End CRUD Outlines -->



<!--Start CRUD Note -->
<script type ="text/javascript">
// Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#nid').val($(this).data('id'));
    $('#title').val($(this).data('title'));
    $('#isi').val($(this).data('body'));
    $('#myModal').modal('show');
});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/note/editItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#nid").val(),
          'title': $('#title').val(),
          'body': $('#isi').val()
},
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.title + "</td><td>" + data.body + "</td><td><button class='edit-modal btn btn-info' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
      }
  });
});
</script>
<!--End CRUD Note -->

<!-- <script type="text/javascript">
    
    /*
      jQuery document ready
    */
    var BASEURL = "{{-- {{ url('/') }} --}}";
    $(document).ready(function()
    {
      /*
        date store today date.
        d store today date.
        m store current month.
        y store current year.
      */
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      
      /*
        Initialize fullCalendar and store into variable.
        Why in variable?
        Because doing so we can use it inside other function.
        In order to modify its option later.
      */
      
      var calendar = $('#calendar').fullCalendar(
      {
        /*
          header option will define our calendar header.
          left define what will be at left position in calendar
          center define what will be at center position in calendar
          right define what will be at right position in calendar
        */
        header:
        {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        /*
          defaultView option used to define which view to show by default,
          for example we have used agendaWeek.
        */
        defaultView: 'month',
        /*
          selectable:true will enable user to select datetime slot
          selectHelper will add helpers for selectable.
        */
        navLinks: true,
        selectable: true,
        selectHelper: true,
        
        /*
          when user select timeslot this option code will execute.
          It has three arguments. Start,end and allDay.
          Start means starting time of event.
          End means ending time of event.
          allDay means if events is for entire day or not.
        */
        select: function(start, end, allDay)
        {
          /*
            after selection user will be promted for enter title for event.
          */
          // var title = prompt('Event Title:');
          start =moment(start).format("YYYY-MM-DD HH:MM:SS");
          $('#date_start').val(start);
          $('#responsive-modal').modal('show');
          
          calendar.fullCalendar('unselect');
        },
        /*
          editable: true allow user to edit events.
        */
        editable: true,
        /*
          events is the main option for calendar.
          for demo we have added predefined events in json object.
        */
        drop: function(start,end,allDay)
        {
          var originalEventObject = $(this).data('originalEventObject');
          var copiedEventObject = $.extend({}, originalEventObject);
          allDay: true,
          copiedEventObject.start = date;
          copiedEventObject.allDay = allDay;
          copiedEventObject.color =color;

          if ($('#drop-remove').is(":checked")) 
          {
            $(this).remove();
          }

          var title = copiedEventObject.title;
          var start = copiedEventObject.start.format(YYYY-MM-DD);

          csrfToken = document.getElementByName("_token")[0].value;
          $.ajax({
            url :'events/update',
            data: 'title=' + title+'&start=' + start+'&allDay=' +allDay +'&color=' +color,
            type: POST,
            headers: {
              "x-csrf-TOKEN" : csrfToken
            },
            success: function(events) {
              console.log('delete');
              $('#calendar').fullCalendar('refetchEvents');
            },
            error: function(json) {
              console.log("error");
            }
          })
        },
      
  
         events: BASEURL + '/events'
      });
      
    });
    $('.colorpicker').colorpicker();
  </script>

<script type ="text/javascript">
$('.tree-toggle').click(function () {
  $(this).parent().children('ul.tree').toggle(200);
});
</script> -->
<script type="text/javascript">
 $(document).ready(function() {
  
var BASEURL = "{{ url('/') }}";
 
 $('#calendar').fullCalendar({
 weekends: true,
 header: {
 left: 'prev,next today',
 center: 'title',
 right: 'month,agendaWeek,agendaDay'
 },
editable: false,
navLinks: true,
selectable: true,
selectHelper: true, // allow "more" link when too many events
events: {
events: BASEURL + '/events',
 error: function() {
 alert("load data tidak berhasil");
 }
 }
 });
 });
 $('.colorpicker').colorpicker();
</script>
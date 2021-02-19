// import helper from '../../helper'
// window.cash = require('cash-dom');
// new webpack.ProvidePlugin({
//     cash: 'cash-dom',
//     cash: 'cash-dom'
// });
window.cash = require('cash-dom');


 function run_waitMe(effect,selector,text){ //effect  win8, win8_linear,bounce, orbit, ios,stretch,roundBounce rotateplane
cash('#'+selector).waitMe({
effect: effect,
text: text,
bg: 'rgba(255,255,255,0.7)',
color: '#000',
maxSize: '',
waitTime: -1,
source: '',
textPos: 'vertical',
fontSize: '',
onClose: function() {}});}

    function reDeclerDataTable() {
        cash('.data-table').data( {
        dom: 'Bfrtip',
       buttons: [{
                    text: 'copy',
                    extend: "copy",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'csv',
                    extend: "csv",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'excel',
                    extend: "excel",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'pdf',
                    extend: "pdf",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'print',
                    extend: "print",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }],
    } );
    }

   cash(document).ready(function() {
  var t =  cash('.data-table').data( {
        dom: 'Bfrtip',
       buttons: [{
                    text: 'copy',
                    extend: "copy",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'csv',
                    extend: "csv",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'excel',
                    extend: "excel",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'pdf',
                    extend: "pdf",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    text: 'print',
                    extend: "print",
                    className: 'btn bg-navy margin',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }],
    } );
            

} );

// cash(document).ajaxStart(function () {
// Pace.restart()
// })

// cash(document).ready(function () {
// cash('.sidebar-menu').tree()
// })


cash('.prevent-resubmit-form').on('submit', function(){
cash('.prevent-resubmit-button').prop("disabled", true);
cash('.prevent-resubmit-button').html('<i class="icon-append fa fa-spinner fa-spin fa-fw"></i> Sending..');
});

// cash('.alert_span').delay(5000).slideUp();

function show_alert_dev(type='danger', msg ) { // Development timer

     cash('#alert_span').html('<div class="alert alert-' + type +' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>Error!</strong>Oppps something went wrong please contact the teachnical team</div>');
     cash('#alert_span').show('slow');
         setTimeout(function(){
      cash('.alert_span').slideUp();
    },duration);

}

function show_success_text(divname,message){
    var content  = cash('#'+divname).html();
    cash('#'+divname).html( "<div class=\"col-md-12\"><div class=\"order-confirmation-page\"><div class=\"breathing-icon\"><i class=\"fa fa-check\"></i></div><h2 class=\"margin-top-30\">Thank You!</h2><p>"+message+"! </p></div></div></div>" );
       setTimeout(function(){
       cash('#'+divname).html(content);
    },4000);
}



 function close_modal(modal_id){
  cash('#'+modal_id).modal('hide');
  cash('body').removeClass('modal-open');
  cash('.modal-backdrop').remove();
  // cash('#'+modal_id).remove();
};

function show_alert(type, msg ,duration=5000) { // Development timer
  // console.log(duration);
    if(type=='success'){
        title = 'Success';
    }
    if(type=='warning'){
        title = 'Warning';
    }
    if(type=='danger'){
        title = 'Error';
    }
    if(type=='warning'){
        title = 'Warning';
    }
    if(type=='default'){
        title = 'Info';
    }

     cash('#alert_span').html('<div class="alert alert-' + type +' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>Success!</strong> '+ msg +'.</div>');
     cash('#alert_span').show('slow');

    setTimeout(function(){
      cash('.alert_span').slideUp();
    },duration);
}


cash(document).on('click', '.deleteTr', function(){
     var id = cash(this).data("id");
     console.log(id);
    var address = cash(this).data("address");
    var token =  cash('meta[name="csrf-token"]').attr('content');
    var force = cash(this).data("force");
    var cashtr = cash(this).closest("tr");
            swal({
                title: 'Are you sure you want to Delate this?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {

                    cash.ajax(
                    {
                        url: "/"+address+"/"+id,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": token,
                            "_force": force,
                        },
                        success: function (){
                            cashtr.fadeOut(500,function(){
                              cashtr.remove();
                               swal(
                                    'Deleted!',
                                    name+' has been deleted successful',
                                    'success'
                                )
                            });
                            cash('.tooltip').hide();
                        },
                        error:function (xhr, ajaxOptions, thrownError){
                          
                            alert(xhr.responseText);
                        }
                    });

            }, function (dismiss) {
               
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });


 cash(document).on('click', '.deleteLi', function(){
     var id = cash(this).data("id");
    var address = cash(this).data("address");
    var token =  cash('meta[name="csrf-token"]').attr('content');
    var force = cash(this).data("force");
    var cashli = cash(this).closest("li");
            swal({
                title: 'Are you sure you want to Delate this?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {

                    cash.ajax(
                    {
                        url: "/"+address+"/"+id,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": token,
                            "_force": force,
                        },
                        success: function (){
                            cashli.fadeOut(500,function(){
                              cashli.remove();
                               swal(
                                    'Deleted!',
                                    name+' has been deleted successful',
                                    'success'
                                )
                            });
                            cash('.tooltip').hide();
                        },
                        error:function (xhr, ajaxOptions, thrownError){
                            alert(xhr.responseText);
                        }
                    });

            }, function (dismiss) {
            
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });

      cash(document).on('click', '.deleteThis', function(){
     var id = cash(this).data("id");
    var table = cash(this).data("table");
    var cashtr = cash(this).closest("tr");
            swal({
                title: 'Are you sure you want to Delete this?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {
                  cash.ajax({
        type: "GET",
        url: "/delete_any/"+table+"/"+id,
        success: function (data) {
                  cashtr.fadeOut(500,function(){ 
                              cashtr.remove();   
                               swal(
                                    'Deleted!',
                                    'Deletion was made successfully ',
                                    'success'
                                )                 
                            }); 
                            cash('.tooltip').hide();
                            },
                       });
                    
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });

       function snackbartext(type,text){
            cash('#text_content').html(text);
             if(type=='success'){
                color = '#3CB371';
            }
            if(type=='warning'){
                color = '#B5C307';
            }
            if(type=='danger'){
                color = '#DF0B1E';
            }
            if(type=='info'){
                color = 'Info';
            }
            cash('#snackbar').css('background-color',color);
            cash('#snackbar').attr('class','show');
            setTimeout(function(){
            cash('#snackbar').removeAttr('class');
            }, 3000);
        }

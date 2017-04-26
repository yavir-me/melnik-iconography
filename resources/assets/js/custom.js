// $(document).ready(function(){

//     // initializeing fancybox
//     $(".fancybox").fancybox();

//     // initializing bootstrap popover
//     $('[data-toggle="popover"]').popover();

//     // make order
//     $('#make-order-form').submit(function(e){
//         e.preventDefault();

//         var makeOrderForm = $(this);

//         var formData = makeOrderForm.serialize();
//         $('#order-errors-full-name').html("");
//         $('#order-errors-email').html("");
//         $('#order-errors-phone').html("");
//         $('#order-errors-comment').html("");
//         $("#order-name").removeClass("has-error");
//         $("#order-email").removeClass("has-error");
//         $("#order-phone").removeClass("has-error");
//         $("#order-comment").removeClass("has-error");

//         $.ajax({
//             url:'/make-order',
//             type:'POST',
//             data:formData,
//             success:function(data){
//                 $('#make-order-modal').modal('hide');
//                 $('.order-gratitude-block').addClass('show');
//             },
//             error: function (data) {
//                 console.log(data.responseText);
//                 var obj = jQuery.parseJSON(data.responseText);
//                 if(obj.name){
//                     $("#order-full-name").addClass("has-error");
//                     $('#order-errors-full-name').html(obj.name);
//                 }
//                 if(obj.email){
//                     $("#order-email").addClass("has-error");
//                     $('#order-errors-email').html(obj.email);
//                 }
//                 if(obj.phone){
//                     $("#order-phone").addClass("has-error");
//                     $('#order-errors-phone').html(obj.phone);
//                 }
//                 if(obj.comment){
//                     $("#order-comment").addClass("has-error");
//                     $('#order-errors-comment').html(obj.comment);
//                 }
//             }
//         });
//     });

// });
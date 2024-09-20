@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <livewire:order />

    </div>


    <div class="modal">
        <div id="print">
            @include('reports.receipts')
        </div>
    </div>


    <style>
        .modal.right .modal-dialog {
            /* position: absolute; */
            top: 0;
            right: 0;
            margin-right: 20vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
        }

        .radio-item input[type="radio"] {
            visibility: hidden;
            width: 20px;
            height: 20px;
            margin: 0 5px;
            padding: 0;
            cursor: pointer;
        }

        /* Before style */
        .radio-item input[type="radio"]:before {
            position: relative;
            margin: 4px -25px -4px 0;
            display: inline-block;
            visibility: visible;
            width: 20px;
            height: 20px;
            border-radius: 10px;
            border: 2px inset rgba(150, 150, 150, 0.75);
            background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%, rgb(250, 250, 250) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
            content: '';
            cursor: pointer;
        }

        /* Checked After style */
        .radio-item input[type="radio"]:checked:after {
            position: relative;
            top: 0;
            left: 9px;
            display: inline-block;
            visibility: visible;
            width: 12px;
            height: 12px;
            border-radius: 6px;
            background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%, rgb(225, 250, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
            content: '';
            cursor: pointer;
        }

        /* After Checked */
        .radio-item input[type="radio"].true:checked:after {
            background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%, rgb(225, 250, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
        }

        .radio-item input[type="radio"].false:checked:after {
            background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%, rgb(250, 250, 250) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
        }

        .radio-item label {
            display: inline-block;
            margin: 0;
            padding: 0;
            line-height: 25px;
            height: 25px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
        }
    </style>
@endsection



@section('script')
    <script>
        $('.add_more').on('click', function() {
            var product = $('.product_id').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + numberofrow + '</td>' +
                '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>' +
                '<td><input type="number" class="form-control quantity" name="quantity[]"></td>' +
                '<td><input type="number" class="form-control price" name="price[]"></td>' +
                '<td><input type="number" class="form-control discount" name="discount[]"></td>' +
                '<td><input type="number" class="form-control total_amount" name="total_amount[]"></td>' +
                '<td><a  class="btn btn-sm btn-danger delete rounded-circle"><i class="fa-solid fa-times"></i></a></td></tr>';
            $('.addMoreProduct').append(tr);
        });

        // DELETE TABLE ROW

        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        });

        function TotalAmount() {

            var total = 0;
            $('.total_amount').each(function(i, e) {

                var amount = $(this).val() - 0;
                total += amount;
            });

            $('.total').html(total);
        };

        $('.addMoreProduct').delegate('.product_id', 'change', function() {
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - ((qty * price * disc) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        $('.addMoreProduct').delegate('.quantity, .discount', 'keyup', function() {
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - ((qty * price * disc) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        $('#paid_amount').keyup(function() {
            var total = $('.total').html();
            var paid_amoumt = $(this).val();
            var tot = paid_amoumt - total;
            $('#balance').val(tot).toFixed(2);
        });


        // Print Section

        function printReceiptContent(el) {
            var data = '<input type="button" id="printPageButton" class="printPageButton" value="Print Receipt"     style="display: block; width: 100%; border: none; background-color: #008B8B; color: #fff; padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" onclick="window.print()"/>';

            data += document.getElementById(el).innerHTML;

            myReceipt = window.open("", "myWin", "left= 150, top=130, width=400, height=400");
                myReceipt.screnX = 0;
                myReceipt.screnY = 0;
                myReceipt.document.write(data);
                myReceipt.document.title = "Print Receipt";
            setTimeout(() => {
                    myReceipt.close();
            }, 8000);
        }




    </script>
@endsection


<?php $__env->startSection('main'); ?>
<div class="py-2">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-auto bg-white min-h-screen pt-[50px]">
            <div class="p-2 text-gray-900">
            </div>
            <div id="" class="p-2 text-gray-900">

                <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                <?php echo app('Illuminate\Foundation\Vite')('resources/js/bookinghistory.js'); ?>
                <div id="booking-history">
                </div>
            </div>

        </div>
        <div class="float-right">
            <div id="paginate" style="margin-top: 5px;"></div>
        </div>

    </div>
</div>


<style>
    .table-responsive {
        height: 180px;
    }


    table {
        background-color: transparent
    }

    caption {
        padding-top: 8px;
        padding-bottom: 8px;
        color: #777;
        text-align: left
    }

    th {
        text-align: left
    }

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd
    }

    .table>thead>tr>th {
        vertical-align: bottom;
        border-bottom: 2px solid #ddd
    }

    .table>caption+thead>tr:first-child>td,
    .table>caption+thead>tr:first-child>th,
    .table>colgroup+thead>tr:first-child>td,
    .table>colgroup+thead>tr:first-child>th,
    .table>thead:first-child>tr:first-child>td,
    .table>thead:first-child>tr:first-child>th {
        border-top: 0
    }

    .table>tbody+tbody {
        border-top: 2px solid #ddd
    }

    .table .table {
        background-color: #fff
    }

    .table-condensed>tbody>tr>td,
    .table-condensed>tbody>tr>th,
    .table-condensed>tfoot>tr>td,
    .table-condensed>tfoot>tr>th,
    .table-condensed>thead>tr>td,
    .table-condensed>thead>tr>th {
        padding: 5px
    }

    .table-bordered {
        border: 1px solid #ddd
    }

    .table-bordered>tbody>tr>td,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>td,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>thead>tr>th {
        border: 1px solid #ddd
    }

    .table-bordered>thead>tr>td,
    .table-bordered>thead>tr>th {
        border-bottom-width: 2px
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9
    }

    .table-hover>tbody>tr:hover {
        background-color: #f5f5f5
    }

    table col[class*=col-] {
        position: static;
        display: table-column;
        float: none
    }

    table td[class*=col-],
    table th[class*=col-] {
        position: static;
        display: table-cell;
        float: none
    }

    .table>tbody>tr.active>td,
    .table>tbody>tr.active>th,
    .table>tbody>tr>td.active,
    .table>tbody>tr>th.active,
    .table>tfoot>tr.active>td,
    .table>tfoot>tr.active>th,
    .table>tfoot>tr>td.active,
    .table>tfoot>tr>th.active,
    .table>thead>tr.active>td,
    .table>thead>tr.active>th,
    .table>thead>tr>td.active,
    .table>thead>tr>th.active {
        background-color: #f5f5f5
    }

    .table-hover>tbody>tr.active:hover>td,
    .table-hover>tbody>tr.active:hover>th,
    .table-hover>tbody>tr:hover>.active,
    .table-hover>tbody>tr>td.active:hover,
    .table-hover>tbody>tr>th.active:hover {
        background-color: #e8e8e8
    }

    .table>tbody>tr.success>td,
    .table>tbody>tr.success>th,
    .table>tbody>tr>td.success,
    .table>tbody>tr>th.success,
    .table>tfoot>tr.success>td,
    .table>tfoot>tr.success>th,
    .table>tfoot>tr>td.success,
    .table>tfoot>tr>th.success,
    .table>thead>tr.success>td,
    .table>thead>tr.success>th,
    .table>thead>tr>td.success,
    .table>thead>tr>th.success {
        background-color: #dff0d8
    }

    .table-hover>tbody>tr.success:hover>td,
    .table-hover>tbody>tr.success:hover>th,
    .table-hover>tbody>tr:hover>.success,
    .table-hover>tbody>tr>td.success:hover,
    .table-hover>tbody>tr>th.success:hover {
        background-color: #d0e9c6
    }

    .table>tbody>tr.info>td,
    .table>tbody>tr.info>th,
    .table>tbody>tr>td.info,
    .table>tbody>tr>th.info,
    .table>tfoot>tr.info>td,
    .table>tfoot>tr.info>th,
    .table>tfoot>tr>td.info,
    .table>tfoot>tr>th.info,
    .table>thead>tr.info>td,
    .table>thead>tr.info>th,
    .table>thead>tr>td.info,
    .table>thead>tr>th.info {
        background-color: #d9edf7
    }

    .table-hover>tbody>tr.info:hover>td,
    .table-hover>tbody>tr.info:hover>th,
    .table-hover>tbody>tr:hover>.info,
    .table-hover>tbody>tr>td.info:hover,
    .table-hover>tbody>tr>th.info:hover {
        background-color: #c4e3f3
    }

    .table>tbody>tr.warning>td,
    .table>tbody>tr.warning>th,
    .table>tbody>tr>td.warning,
    .table>tbody>tr>th.warning,
    .table>tfoot>tr.warning>td,
    .table>tfoot>tr.warning>th,
    .table>tfoot>tr>td.warning,
    .table>tfoot>tr>th.warning,
    .table>thead>tr.warning>td,
    .table>thead>tr.warning>th,
    .table>thead>tr>td.warning,
    .table>thead>tr>th.warning {
        background-color: #fcf8e3
    }

    .table-hover>tbody>tr.warning:hover>td,
    .table-hover>tbody>tr.warning:hover>th,
    .table-hover>tbody>tr:hover>.warning,
    .table-hover>tbody>tr>td.warning:hover,
    .table-hover>tbody>tr>th.warning:hover {
        background-color: #faf2cc
    }

    .table>tbody>tr.danger>td,
    .table>tbody>tr.danger>th,
    .table>tbody>tr>td.danger,
    .table>tbody>tr>th.danger,
    .table>tfoot>tr.danger>td,
    .table>tfoot>tr.danger>th,
    .table>tfoot>tr>td.danger,
    .table>tfoot>tr>th.danger,
    .table>thead>tr.danger>td,
    .table>thead>tr.danger>th,
    .table>thead>tr>td.danger,
    .table>thead>tr>th.danger {
        background-color: #f2dede
    }

    .table-hover>tbody>tr.danger:hover>td,
    .table-hover>tbody>tr.danger:hover>th,
    .table-hover>tbody>tr:hover>.danger,
    .table-hover>tbody>tr>td.danger:hover,
    .table-hover>tbody>tr>th.danger:hover {
        background-color: #ebcccc
    }

    .table-responsive {
        min-height: .01%;
        overflow-x: auto
    }

    @media screen and (max-width:767px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #ddd
        }

        .table-responsive>.table {
            margin-bottom: 0
        }

        .table-responsive>.table>tbody>tr>td,
        .table-responsive>.table>tbody>tr>th,
        .table-responsive>.table>tfoot>tr>td,
        .table-responsive>.table>tfoot>tr>th,
        .table-responsive>.table>thead>tr>td,
        .table-responsive>.table>thead>tr>th {
            white-space: nowrap
        }

        .table-responsive>.table-bordered {
            border: 0
        }

        .table-responsive>.table-bordered>tbody>tr>td:first-child,
        .table-responsive>.table-bordered>tbody>tr>th:first-child,
        .table-responsive>.table-bordered>tfoot>tr>td:first-child,
        .table-responsive>.table-bordered>tfoot>tr>th:first-child,
        .table-responsive>.table-bordered>thead>tr>td:first-child,
        .table-responsive>.table-bordered>thead>tr>th:first-child {
            border-left: 0
        }

        .table-responsive>.table-bordered>tbody>tr>td:last-child,
        .table-responsive>.table-bordered>tbody>tr>th:last-child,
        .table-responsive>.table-bordered>tfoot>tr>td:last-child,
        .table-responsive>.table-bordered>tfoot>tr>th:last-child,
        .table-responsive>.table-bordered>thead>tr>td:last-child,
        .table-responsive>.table-bordered>thead>tr>th:last-child {
            border-right: 0
        }

        .table-responsive>.table-bordered>tbody>tr:last-child>td,
        .table-responsive>.table-bordered>tbody>tr:last-child>th,
        .table-responsive>.table-bordered>tfoot>tr:last-child>td,
        .table-responsive>.table-bordered>tfoot>tr:last-child>th {
            border-bottom: 0
        }
    }
</style>
<script>
    $.fn.pageMe = function(opts) {
        var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pager');

        if (typeof settings.childSelector != "undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector != "undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.size();
        var numPages = Math.ceil(numItems / perPage);

        pager.data("curr", 0);

        if (settings.showPrevNext) {
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
        }

        var curr = 0;
        while (numPages > curr && (settings.hidePageNumbers == false)) {
            $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
            curr++;
        }

        if (settings.showPrevNext) {
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages <= 1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");

        children.hide();
        children.slice(0, perPage).show();

        pager.find('li .page_link').click(function() {
            var clickedPage = $(this).html().valueOf() - 1;
            goTo(clickedPage, perPage);
            return false;
        });
        pager.find('li .prev_link').click(function() {
            previous();
            return false;
        });
        pager.find('li .next_link').click(function() {
            next();
            return false;
        });

        function previous() {
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next() {
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page) {
            var startAt = page * perPage,
                endOn = startAt + perPage;

            children.css('display', 'none').slice(startAt, endOn).show();

            if (page >= 1) {
                pager.find('.prev_link').show();
            } else {
                pager.find('.prev_link').hide();
            }

            if (page < (numPages - 1)) {
                pager.find('.next_link').show();
            } else {
                pager.find('.next_link').hide();
            }

            pager.data("curr", page);
            pager.children().removeClass("active");
            pager.children().eq(page + 1).addClass("active");

        }
    };

    $(document).ready(function() {

        $('#myTable').pageMe({
            pagerSelector: '#myPager',
            showPrevNext: true,
            hidePageNumbers: false,
            perPage: 4
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('CustomerUI.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/CustomerUI/page/booking.blade.php ENDPATH**/ ?>
$(document).ready(function () {
    $('select').formSelect();

    var $filterGrid = $('.js-filter-grid');

    $filterGrid.isotope({
        itemSelector: '.js-filter-grid-item',
        layoutMode: 'fitRows',
        getSortData: {
            date: '[data-pub-date] parseInt',
            dateRev: '[data-pub-date] parseInt',
            featured: function (itemElem) {
                return $(itemElem).data('is-featured') === '' ? 0 : 1;
            },
            rank: '[data-page-hits] parseInt',
            topic: '[data-topic]'
        },
        sortAscending: {
            date: false,
            dateRev: true,
            featured: false,
            rank: false,
            topic: true
        }
    });

    // Filter from one select box OR another but not from both at the same time
    $('.video-filter').on('change', function () {
        var filterValue = this.value;
        $filterGrid.isotope({ filter: filterValue });
        console.log(filterValue);
    });

    $('#category-filter').change(function () {
        $('#topic-filter option:first').prop('selected', 'selected');
    });

    $('#topic-filter').change(function () {
        $('#category-filter option:first').prop('selected', 'selected');
    });

    $("#search-filter").on('keyup', function () {
        var qsRegex = new RegExp($(this).val(), 'gi');
        $filterGrid.isotope({
            filter: function () {
                return qsRegex ? $(this).text().match(qsRegex) : true;
            }
        });
    });

    $(".clear-filter").click(function () {
        $('.video-filter').val('*').trigger('change');
        $('#search-filter').val('');
        $filterGrid.isotope({ filter: '*' });
    });
});
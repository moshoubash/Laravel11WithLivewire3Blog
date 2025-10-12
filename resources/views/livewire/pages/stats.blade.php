@section('styles')
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endsection
<div class="container mx-auto py-10 min-h-screen bg-gray-800 max-w-full">
    <div class="flex flex-wrap gap-6 justify-center align-middle">
        <div class="w-[250px] h-[100px] bg-white rounded-lg shadow flex justify-between items-center">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">Total Posts</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $numberOfPosts ?? 0 }}</p>
            </div>
            <div class="w-[50px] h-[50px] bg-gray-800 text-white rounded-full flex items-center justify-center mr-4">
                <i class="fa fa-book"></i>
            </div>
        </div>
        <div class="w-[250px] h-[100px] bg-white rounded-lg shadow flex justify-between items-center">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">Total Views</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $totalViews ?? 0 }}</p>
            </div>
            <div class="w-[50px] h-[50px] bg-gray-800 text-white rounded-full flex items-center justify-center mr-4">
                <i class="fa fa-eye"></i>
            </div>
        </div>
        <div class="w-[250px] h-[100px] bg-white rounded-lg shadow flex justify-between items-center">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">Total Likes</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $totalLikes ?? 0 }}</p>
            </div>
            <div class="w-[50px] h-[50px] bg-gray-800 text-white rounded-full flex items-center justify-center mr-4">
                <i class="fa fa-thumbs-up"></i>
            </div>
        </div>
        <div class="w-[250px] h-[100px] bg-white rounded-lg shadow flex justify-between items-center">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">Avg. Views</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $averageViews }}</p>
            </div>
            <div class="w-[50px] h-[50px] bg-gray-800 text-white rounded-full flex items-center justify-center mr-4">
                <i class="fa fa-gauge"></i>
            </div>
        </div>
    </div>

    <div class="mt-10 p-6 rounded-lg mx-auto bg-white grid grid-cols-1 md:grid-cols-2 gap-6 min-h-[50vh] shadow" style="max-width: 1080px;">
        <div id="container"></div>
        
        <table class="table-auto md:table-fixed">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Post Title</th>
                    <th class="px-4 py-2">Views</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topViewedPosts as $post)
                    <tr class="bg-white border-b">
                        <td class="px-4 py-2">{{ $post['name'] }}</td>
                        <td class="px-4 py-2">{{ $post['y'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('scripts')
    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Top viewed posts'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>',
                shared: true
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Views',
                colorByPoint: true,
                data: @json($topViewedPosts)
            }]
        });
    </script>
@endsection
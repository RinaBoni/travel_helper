@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Главная</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
            <li class="breadcrumb-item active">Главная</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">


        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $data['usersCount'] }}</h3>

            <p>Пользователи</p>
            </div>
            <div class="icon">
            <i class="fa-solid fa-users"></i>
            </div>
            <a href="{{ route('admin.user.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $data['postsCount'] }}<sup style="font-size: 20px"></sup></h3>

            <p>Достопримечательности</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-book"></i>
            </div>
            <a href="{{ route('admin.post.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $data['categoriesCount'] }}</h3>

            <p>Категории</p>
            </div>
            <div class="icon">
            <i class="fa-solid fa-table-list"></i>
            </div>
            <a href="{{ route('admin.category.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ $data['tagsCount'] }}</h3>

            <p>Тэги</p>
            </div>
            <div class="icon">
            <i class="fa-solid fa-tags"></i>
            </div>
            <a href="{{ route('admin.tag.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Топ достопримечательностей</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                @foreach ($likedPosts as $post)
                        <div class="" data-aos="fade-up">
                            <a href="{{ route('admin.post.show', $post->id) }}" class="blog-post-permalink">
                                <label>{{ $post->title }}</label>
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="fa fa-regular fa-heart" style="color: #B197FC;"></i>
                            </a>
                        </div>
                    @endforeach
            </div>
            <!-- /.card-body -->
        </div>


        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(function () {
      /*
       * Flot Interactive Chart
       * -----------------------
       */
      // We use an inline data source in the example, usually data would
      // be fetched from a server
      var data        = [],
          totalPoints = 100

      function getRandomData() {

        if (data.length > 0) {
          data = data.slice(1)
        }

        // Do a random walk
        while (data.length < totalPoints) {

          var prev = data.length > 0 ? data[data.length - 1] : 50,
              y    = prev + Math.random() * 10 - 5

          if (y < 0) {
            y = 0
          } else if (y > 100) {
            y = 100
          }

          data.push(y)
        }

        // Zip the generated y values with the x values
        var res = []
        for (var i = 0; i < data.length; ++i) {
          res.push([i, data[i]])
        }

        return res
      }

      var interactive_plot = $.plot('#interactive', [
          {
            data: getRandomData(),
          }
        ],
        {
          grid: {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
          },
          series: {
            color: '#3c8dbc',
            lines: {
              lineWidth: 2,
              show: true,
              fill: true,
            },
          },
          yaxis: {
            min: 0,
            max: 100,
            show: true
          },
          xaxis: {
            show: true
          }
        }
      )

      var updateInterval = 500 //Fetch data ever x milliseconds
      var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
      function update() {

        interactive_plot.setData([getRandomData()])

        // Since the axes don't change, we don't need to call plot.setupGrid()
        interactive_plot.draw()
        if (realtime === 'on') {
          setTimeout(update, updateInterval)
        }
      }

      //INITIALIZE REALTIME DATA FETCHING
      if (realtime === 'on') {
        update()
      }
      //REALTIME TOGGLE
      $('#realtime .btn').click(function () {
        if ($(this).data('toggle') === 'on') {
          realtime = 'on'
        }
        else {
          realtime = 'off'
        }
        update()
      })
      /*
       * END INTERACTIVE CHART
       */


      /*
       * LINE CHART
       * ----------
       */
      //LINE randomly generated data

      var sin = [],
          cos = []
      for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)])
        cos.push([i, Math.cos(i)])
      }
      var line_data1 = {
        data : sin,
        color: '#3c8dbc'
      }
      var line_data2 = {
        data : cos,
        color: '#00c0ef'
      }
      $.plot('#line-chart', [line_data1, line_data2], {
        grid  : {
          hoverable  : true,
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor  : '#f3f3f3'
        },
        series: {
          shadowSize: 0,
          lines     : {
            show: true
          },
          points    : {
            show: true
          }
        },
        lines : {
          fill : false,
          color: ['#3c8dbc', '#f56954']
        },
        yaxis : {
          show: true
        },
        xaxis : {
          show: true
        }
      })
      //Initialize tooltip on hover
      $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
        position: 'absolute',
        display : 'none',
        opacity : 0.8
      }).appendTo('body')
      $('#line-chart').bind('plothover', function (event, pos, item) {

        if (item) {
          var x = item.datapoint[0].toFixed(2),
              y = item.datapoint[1].toFixed(2)

          $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
            .css({
              top : item.pageY + 5,
              left: item.pageX + 5
            })
            .fadeIn(200)
        } else {
          $('#line-chart-tooltip').hide()
        }

      })
      /* END LINE CHART */

      /*
       * FULL WIDTH STATIC AREA CHART
       * -----------------
       */
      var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
        [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
        [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
      $.plot('#area-chart', [areaData], {
        grid  : {
          borderWidth: 0
        },
        series: {
          shadowSize: 0, // Drawing is faster without shadows
          color     : '#00c0ef',
          lines : {
            fill: true //Converts the line chart to area chart
          },
        },
        yaxis : {
          show: false
        },
        xaxis : {
          show: false
        }
      })

      /* END AREA CHART */

      /*
       * BAR CHART
       * ---------
       */

      var bar_data = {
        data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
        bars: { show: true }
      }
      $.plot('#bar-chart', [bar_data], {
        grid  : {
          borderWidth: 1,
          borderColor: '#f3f3f3',
          tickColor  : '#f3f3f3'
        },
        series: {
           bars: {
            show: true, barWidth: 0.5, align: 'center',
          },
        },
        colors: ['#3c8dbc'],
        xaxis : {
          ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
        }
      })
      /* END BAR CHART */

      /*
       * DONUT CHART
       * -----------
       */

      var donutData = [
        {
          label: 'Series2',
          data : 30,
          color: '#3c8dbc'
        },
        {
          label: 'Series3',
          data : 20,
          color: '#0073b7'
        },
        {
          label: 'Series4',
          data : 50,
          color: '#00c0ef'
        }
      ]
      $.plot('#donut-chart', donutData, {
        series: {
          pie: {
            show       : true,
            radius     : 1,
            innerRadius: 0.5,
            label      : {
              show     : true,
              radius   : 2 / 3,
              formatter: labelFormatter,
              threshold: 0.1
            }

          }
        },
        legend: {
          show: false
        }
      })
      /*
       * END DONUT CHART
       */

    })

    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }
  </script>

@endsection

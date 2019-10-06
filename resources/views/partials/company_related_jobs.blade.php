<!--right element-->
<div class="right-element col-lg-3 col-md-12 col-sm-12 col-xs-12 wow slideInRight">

    <!--jobs-->
    <div class="jobs col-md-9 col-xs-12">
        <div class="head_job">
            <p>Related Job ...</p>
        </div>

        <div class="all_jobs">
            @foreach($related_jobs as $related_job)
                @if($related_job->company)
            <div class="work col-md-3">
                @if($related_job->company->logo)
                    <img style="width: 100%" src="{{url(asset('storage/'.$related_job->company->logo))}}" alt="{{$related_job->job_title}}" class="img-responsive img-thumbnail">
                @else
                    <img src="{{url(asset('storage/companies/default-logo.png'))}}" class="img-responsive img-thumbnail" alt="">
                @endif
                <h4>{{$related_job->company->name}}</h4>
                <br>
                <h5><a href="{{route('jobs.show',$related_job->slug)}}">{{$related_job->job_title}}</a></h5>
                <p>{{\Carbon\Carbon::parse($related_job->created_at)->diffForHumans()}}</p>
            </div>
            <hr>
                @endif
            @endforeach

        </div><!--all_jobs end-->
    </div><!--jobs end-->
</div><!--right-element end-->

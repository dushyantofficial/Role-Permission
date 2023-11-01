<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"
          media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="{{asset('resume/css/font-awesome/css/all.min.css?ver=1.2.0')}}" rel="stylesheet">
    <link href="{{asset('resume/css/bootstrap.min.css?ver=1.2.0')}}" rel="stylesheet">
    <link href="{{asset('resume/css/aos.css?ver=1.2.0')}}" rel="stylesheet">
    <link href="{{asset('resume/css/main.css?ver=1.2.0')}}" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
</head>
<body id="top">
<header class="d-print-none">
    <div class="container text-center text-lg-left">
        <div class="py-3 clearfix">
        </div>
    </div>
</header>
<div class="page-content">
    <div class="container">
        <div class="cover shadow-lg bg-white">
            <div class="cover-bg p-3 p-lg-4 text-white">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="avatar hover-effect bg-white shadow-sm p-1">
                            @if($resumes->profile_pic == null)
                            <img
                                src="{{asset('resume/images/avatar.jpg')}}" width="200" height="200"/>
                            @else
                                <img
                                    src="{{asset('storage/images/'.$resumes->profile_pic)}}" width="200" height="200"/>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 text-center text-md-start">
                        <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">{{$resumes->name}}</h2>
                        <p data-aos="fade-left" data-aos-delay="100">{{$resumes->destination}}</p>
                        <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
                            <a class="btn btn-light text-dark shadow-sm mt-1 me-1" href="{{route('download-pdf')}}?id={{request('id')}}"
                                >Download CV</a></div>
                    </div>
                </div>
            </div>
            <div class="about-section pt-4 px-3 px-lg-4 mt-1">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="h3 mb-3">About Me</h2>
                        <p>{{$resumes->about_me}}</p>
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="row mt-2">
                            <div class="col-sm-4">
                                <div class="pb-1">Age</div>
                            </div>
                            <div class="col-sm-8">
                                <div class="pb-1 text-secondary">{{$resumes->age}}</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="pb-1">Email</div>
                            </div>
                            <div class="col-sm-8">
                                <div class="pb-1 text-secondary">{{$resumes->email}}</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="pb-1">Phone</div>
                            </div>
                            <div class="col-sm-8">
                                <div class="pb-1 text-secondary">+91 {{$resumes->phone}}</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="pb-1">Address</div>
                            </div>
                            <div class="col-sm-8">
                                <div class="pb-1 text-secondary">{{$resumes->address}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($professional_skills) > 0)
                <hr class="d-print-none"/>
                <div class="skills-section px-3 px-lg-4">
                    <h2 class="h3 mb-3">Professional Skills</h2>
                    <div class="row">
                        @foreach($professional_skills as $professional_skill)
                            <div class="col-md-6">
                                <div class="mb-2"><span>{{$professional_skill->professional_skills}}</span>
                                    <div class="progress my-1">
                                        <div class="progress-bar {{ $professional_skill['color'] }}" role="progressbar" data-aos="zoom-in-right"
                                             data-aos-delay="100" data-aos-anchor=".skills-section" style="width: {{ $professional_skill['professional_per'] }}%"
                                             aria-valuenow="{{ $professional_skill['professional_per'] }}"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(count($work_experiences) > 0)
                <hr class="d-print-none"/>
                <div class="work-experience-section px-3 px-lg-4">
                    <h2 class="h3 mb-4">Work Experience</h2>
                    @foreach($work_experiences as $work_experience)
                        <div class="timeline">
                            <div class="timeline-card timeline-card-primary card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">{{$work_experience->destination}} <span class="text-muted h6">at {{$work_experience->company_name}}</span>
                                    </div>
                                    @php
                                        $start_date = \Carbon\Carbon::createFromFormat('Y-m', $work_experience->start_date);
                                        $startDate = $start_date->format('M, Y');
                                        if ($work_experience->end_date == 'Present'){
                                            $endDate = 'Present';
                                             $end_date = \Carbon\Carbon::createFromFormat('Y-m', date('Y-m'));
                                            $startDates = \Carbon\Carbon::parse($start_date);
                                            $endDates = \Carbon\Carbon::parse($end_date);
                                            // Calculate the difference in months
                                            $monthsOfExperience = $endDates->diffInMonths($startDates);

                                            $years = floor($monthsOfExperience / 12);
                                        $remainingMonths = $monthsOfExperience % 12;

                                        // Format the result as "X year(s) Y month(s)"
                                        if ($years > 0 && $remainingMonths > 0) {
                                            $experience = $years . ' year(s) ' . $remainingMonths . ' month(s)';
                                        } elseif ($years > 0) {
                                            $experience = $years . ' year(s)';
                                        } else {
                                            $experience = $remainingMonths . ' month(s)';
                                        }

                                        }else{
                                            $end_date = \Carbon\Carbon::createFromFormat('Y-m', $work_experience->end_date);
                                            $startDates = \Carbon\Carbon::parse($start_date);
                                            $endDates = \Carbon\Carbon::parse($end_date);
                                            // Calculate the difference in months
                                            $monthsOfExperience = $endDates->diffInMonths($startDates);
                                            $finaMonth = $monthsOfExperience-1;
                                        $endDate = $start_date->format('M, Y');
                                        $years = floor($monthsOfExperience / 12);
                                        $remainingMonths = $monthsOfExperience % 12;
                                        // Format the result as "X year(s) Y month(s)"
                                        if ($years > 0 && $remainingMonths > 0) {
                                            $experience = $years . ' year(s) ' . $remainingMonths . ' month(s)';
                                        } elseif ($years > 0) {
                                            $experience = $years . ' year(s)';
                                        } else {
                                            $experience = $remainingMonths . ' month(s)';
                                        }
                                        }
                                    @endphp
                                    <div class="text-muted text-small mb-2">{{$startDate}}
                                        - {{$endDate}} ({{$experience}})
                                    </div>
                                    <div>
                                        {{$work_experience->description}}
                                    </div>
                                    {{--                            <div>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(count($educations) > 0)
                <hr class="d-print-none"/>
                <div class="page-break"></div>
                <div class="education-section px-3 px-lg-4 pb-4">
                    <h2 class="h3 mb-4">Education</h2>
                    @foreach($educations as $education)
                        <div class="timeline">
                            <div class="timeline-card timeline-card-success card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">{{$education->degree_name}} <span class="text-muted h6">from {{$education->college_name}}({{$education->university_name}})</span>
                                    </div>
                                    @php
                                        if ($education->end_date == 'Present'){
                  $end_date = 'present';
            }else{
                 $end_date = date('Y',strtotime($education->end_date));
            }

                                    @endphp
                                    <div
                                        class="text-muted text-small mb-2">{{date('Y',strtotime($education->start_date))}}
                                        -
                                        {{$end_date}}</div>
                                    <div class="text-muted text-lg mb-2">
                                        <span>Grade:-{{strtoupper($education->grade)}}</span></div>
                                    <div>
                                        {{$education->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(count($projects) > 0)
                <hr class="d-print-none"/>
                <div class="page-break"></div>
                <div class="education-section px-3 px-lg-4 pb-4">
                    <h2 class="h3 mb-4">Project</h2>
                    @foreach($projects as $project)
                        @php
                            if ($project->end_date == 'Present'){
              $end_date = 'present';
        }else{
             $end_date = date('Y',strtotime($project->end_date));
        }
                        @endphp
                        <div class="timeline">
                            <div class="timeline-card timeline-card-dark card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">{{$project->project_name}} <span class="text-muted h6">from {{$project->company_name}}({{$project->city_name}})</span>
                                    </div>
                                    <div
                                        class="text-muted text-small mb-2">{{date('Y',strtotime($education->start_date))}}
                                        -
                                        {{$end_date}}</div>
                                    <div class="text-muted text-lg mb-2">
                                        <span>City:-{{strtoupper($project->city_name)}}</span></div>
                                    <div>
                                        {{$project->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($courses) > 0)
                <hr class="d-print-none"/>
                <div class="page-break"></div>
                <div class="education-section px-3 px-lg-4 pb-4">
                    <h2 class="h3 mb-4">Course</h2>
                    @foreach($courses as $course)
                        @php
                            if ($course->end_date == 'Present'){
              $end_date = 'present';
        }else{
             $end_date = date('Y-m',strtotime($course->end_date));
        }
                        @endphp
                        <div class="timeline">
                            <div class="timeline-card timeline-card-success card shadow-sm">
                                <div class="card-body">
                                    <div class="h5 mb-1">{{$course->course_name}} <span
                                            class="text-muted h6">from {{$course->institution_name}}</span>
                                    </div>
                                    <div
                                        class="text-muted text-small mb-2">{{date('Y-m',strtotime($course->start_date))}}
                                        -
                                        {{$end_date}}</div>
                                    <div class="text-muted text-lg mb-2">
                                        <span>City:-{{strtoupper($project->city_name)}}</span></div>
                                    <div>
                                        {{$course->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <hr class="d-print-none"/>

        </div>
    </div>
</div>
<script src="{{asset('resume/scripts/bootstrap.bundle.min.js?ver=1.2.0')}}"></script>
<script src="{{asset('resume/scripts/aos.js?ver=1.2.0')}}"></script>
<script src="{{asset('resume/scripts/main.js?ver=1.2.0')}}"></script>
</body>
</html>

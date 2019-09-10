@extends('layouts.backend')

@section('content')
    <section class="">
        <div class="bg-image" style="background-image: url('{{ $project->banner }}');">
            <div class="bg-black-op-75">
                <div class="content content-top text-center">
                    <div class="py-100">
                        <h1 class="font-w700 text-white mb-10">{{ $project->title }}</h1>
                        <h2 class="h4 font-w400 text-white-op">Explore the world and provide value at the same time.</h2>
                        <div class="font-size-md text-muted">
                            <a class="text-body-bg-dark" href="be_pages_generic_profile.php">{{ $project->user->name }}</a> • <span id="projectDate"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });

        let date = "@php echo $project->date @endphp"

        let relativeDate = moment(date).format("MMM Do YY");

        console.log(relativeDate);

        document.getElementById('projectDate').innerHTML = relativeDate;

    </script>
@endsection
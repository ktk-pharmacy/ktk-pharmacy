@include('frontend.Layouts.headers')
<section class="apply-now" id="apply">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="accordions is-first-expanded">
                    <article class="accordion">
                        <div class="accordion-head">
                            <span>About KTK Pharmacy</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p>
                                    {{ site_settings()['header_text'] }}
                                </p>
                            </div>
                        </div>
                    </article>
                    <article class="accordion">
                        <div class="accordion-head">
                            <span>Our Mission</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p>{{ site_settings()['mission'] }}</p>
                            </div>
                        </div>
                    </article>
                    <article class="accordion">
                        <div class="accordion-head">
                            <span>Our Vision</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p>{{ site_settings()['vision'] }}</p>
                            </div>
                        </div>
                    </article>
                    <article class="accordion last-accordion">
                        <div class="accordion-head">
                            <span>Core Value</span>
                            <span class="icon">
                                <i class="icon fa fa-chevron-right"></i>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="content">
                                <p>{{ site_settings()['core_value'] }}</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.Layouts.footer')

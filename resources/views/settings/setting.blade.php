<x-app-layout>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Settings</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form method="post" action="{{ route('settings_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link show mb-1 active" id="general-tab" data-toggle="pill"
                                        href="#setting-general" role="tab" aria-controls="setting-general"
                                        aria-selected="true">
                                        General</a>
                                    <a class="nav-link mb-1" id="setting-contact" data-toggle="pill"
                                        href="#setting-contact-tab" role="tab" aria-controls="setting-contact-tab"
                                        aria-selected="false">
                                        Contact Info</a>
                                    <a class="nav-link mb-1" id="setting-fact" data-toggle="pill"
                                        href="#setting-fact-tab" role="tab" aria-controls="setting-fact-tab"
                                        aria-selected="false">
                                        Fact About Company</a>
                                    <a class="nav-link mb-1" id="setting-social" data-toggle="pill"
                                        href="#setting-social-tab" role="tab" aria-controls="setting-social-tab"
                                        aria-selected="false">
                                        Social Links</a>
                                    <a class="nav-link mb-1" id="setting-aboutus" data-toggle="pill"
                                        href="#setting-aboutus-tab" role="tab" aria-controls="setting-aboutus-tab"
                                        aria-selected="false">
                                        About Us</a>
                                    <a class="nav-link mb-1" id="setting-theme" data-toggle="pill"
                                        href="#setting-theme-tab" role="tab" aria-controls="setting-theme-tab"
                                        aria-selected="false">
                                        Theme</a>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-md-6 mt-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="setting-general" role="tabpanel"
                                        aria-labelledby="general-tab">
                                        <!-- Site Name En-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_name" class="form-label">Site Name</label>
                                                <input type="text" name="site_name"
                                                    value="{{ $site_settings['site_name']['value'] }}" id="site_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <!--Site Name MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_name_mm" class="form-label">Site Name MM</label>
                                                <input type="text" name="site_name_mm"
                                                    value="{{ $site_settings['site_name']['value_mm'] }}"
                                                    id="site_name_mm" class="form-control">
                                            </div>
                                        </div>
                                        <!--Site Title En-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_title" class="form-label">Site Title</label>
                                                <input type="text" name="site_title"
                                                    value="{{ $site_settings['site_title']['value'] }}" id="site_title"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <!--Site Title MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_title_mm" class="form-label">Site Title MM</label>
                                                <input type="text" name="site_title_mm"
                                                    value="{{ $site_settings['site_title']['value_mm'] }}"
                                                    id="site_title_mm" class="form-control">
                                            </div>
                                        </div>
                                        <!--Site Url En-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_url" class="form-label">Site Url</label>
                                                <input type="text" name="site_url"
                                                    value="{{ $site_settings['site_url']['value'] }}" id="site_url"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <!--Header Text En-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="header_text" class="form-label">Header Text</label>
                                                <textarea type="text" name="header_text" id="header_text" class="form-control" rows="6">{{ $site_settings['header_text']['value'] }}</textarea>
                                            </div>
                                        </div>
                                        <!--Header Text MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="header_text_mm" class="form-label">Header Text MM</label>
                                                <textarea type="text" name="header_text_mm" id="header_text_mm" class="form-control" rows="6">{{ $site_settings['header_text']['value_mm'] }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- end General-->

                                    <div class="tab-pane fade" id="setting-contact-tab" role="tabpanel"
                                        aria-labelledby="setting-contact">
                                        <!--Email En-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_email" class="form-label">Email</label>
                                                <input type="text" name="default_email"
                                                    value="{{ $site_settings['default_email']['value'] }}"
                                                    id="default_email" class="form-control">
                                            </div>
                                        </div>
                                        <!--Phone EN-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_phone_number" class="form-label">Phone
                                                    Number</label>
                                                <input type="text" name="default_phone_number"
                                                    value="{{ $site_settings['default_phone_number']['value'] }}"
                                                    id="default_phone_number" class="form-control">
                                            </div>
                                        </div>
                                        <!--Phone MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_phone_number_mm" class="form-label">Phone
                                                    Number MM</label>
                                                <input type="text" name="default_phone_number_mm"
                                                    value="{{ $site_settings['default_phone_number']['value_mm'] }}"
                                                    id="default_phone_number_mm" class="form-control">
                                            </div>
                                        </div>
                                        <!--Address EN-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_address" class="form-label">Address</label>
                                                <textarea type="text" name="default_address" id="default_address" class="form-control" rows="6">{{ $site_settings['default_address']['value'] }}</textarea>
                                            </div>
                                        </div>
                                        <!--Address MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_address_mm" class="form-label">Address MM</label>
                                                <textarea type="text" name="default_address_mm" id="default_address_mm" class="form-control" rows="6">{{ $site_settings['default_address']['value_mm'] }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_location" class="form-label">Location
                                                    Map(iframe)</label>
                                                <textarea type="text" name="default_location" id="default_location" class="form-control" rows="6">{{ $site_settings['default_location']['value'] }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- end Contact-->

                                    <!--Facts about company-->
                                    <div class="tab-pane fade" id="setting-fact-tab" role="tabpanel"
                                        aria-labelledby="setting-fact">
                                        <!--Staffs EN-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_staffs" class="form-label">Staffs</label>
                                                <input type="text" name="default_staffs"
                                                    value="{{ $site_settings['default_staffs']['value'] }}"
                                                    id="default_staffs" class="form-control">
                                            </div>
                                        </div>
                                        <!--Staffs MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_staffs_mm" class="form-label">Staffs MM</label>
                                                <input type="text" name="default_staffs_mm"
                                                    value="{{ $site_settings['default_staffs']['value_mm'] }}"
                                                    id="default_staffs_mm" class="form-control">
                                            </div>
                                        </div>
                                        <!--Products EN-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_products" class="form-label">Products</label>
                                                <input type="text" name="default_products"
                                                    value="{{ $site_settings['default_products']['value'] }}"
                                                    id="default_products" class="form-control">
                                            </div>
                                        </div>
                                        <!--Products MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_products_mm" class="form-label">Products
                                                    MM</label>
                                                <input type="text" name="default_products_mm"
                                                    value="{{ $site_settings['default_products']['value_mm'] }}"
                                                    id="default_products_mm" class="form-control">
                                            </div>
                                        </div>
                                        <!--Current Partners EN-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_curr_partner" class="form-label">Current
                                                    Partners</label>
                                                <input type="text" name="default_curr_partner"
                                                    value="{{ $site_settings['default_curr_partner']['value'] }}"
                                                    id="default_curr_partner" class="form-control">
                                            </div>
                                        </div>
                                        <!--Current Partners MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_curr_partner_mm" class="form-label">Current
                                                    Partners</label>
                                                <input type="text" name="default_curr_partner_mm"
                                                    value="{{ $site_settings['default_curr_partner']['value_mm'] }}"
                                                    id="default_curr_partner_mm" class="form-control">
                                            </div>
                                        </div>
                                        <!--Distributed Region EN-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_dist_region" class="form-label">Distributed
                                                    Region</label>
                                                <input type="text" name="default_dist_region"
                                                    value="{{ $site_settings['default_dist_region']['value'] }}"
                                                    id="default_dist_region" class="form-control">
                                            </div>
                                        </div>
                                        <!--Distributed Region MM-->
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_dist_region_mm" class="form-label">Distributed
                                                    Region MM</label>
                                                <input type="text" name="default_dist_region_mm"
                                                    value="{{ $site_settings['default_dist_region']['value_mm'] }}"
                                                    id="default_dist_region_mm" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--End facts about company-->

                                    <div class="tab-pane fade" id="setting-social-tab" role="tabpanel"
                                        aria-labelledby="setting-social">
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_facebook" class="form-label">Facebook</label>
                                                <input type="text" name="social_facebook"
                                                    value="{{ $site_settings['social_facebook']['value'] }}"
                                                    id="social_facebook" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_twitter" class="form-label">Twitter</label>
                                                <input type="text" name="social_twitter"
                                                    value="{{ $site_settings['social_twitter']['value'] }}"
                                                    id="social_twitter" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_instagram" class="form-label">Instagram</label>
                                                <input type="text" name="social_instagram"
                                                    value="{{ $site_settings['social_instagram']['value'] }}"
                                                    id="social_instagram" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_linkedin" class="form-label">LinkedIn</label>
                                                <input type="text" name="social_linkedin"
                                                    value="{{ $site_settings['social_linkedin']['value'] }}"
                                                    id="social_linkedin" class="form-control">
                                            </div>
                                        </div>
                                    </div><!-- end Social-->
                                    <div class="tab-pane fade" id="setting-aboutus-tab" role="tabpanel"
                                        aria-labelledby="aboutus-tab">
                                        <div class="form-group row mb-3">
                                            <!--About Company EN-->
                                            <div class="col-12">
                                                <label for="about_company" class="form-label">About Company</label>
                                                <input type="text" name="about_company"
                                                    value="{{ $site_settings['about_company']['value'] }}"
                                                    id="about_company" class="form-control">
                                            </div>
                                            <!--About Company MM-->
                                            <div class="col-12 mt-2">
                                                <label for="about_company_mm" class="form-label">About Company
                                                    MM</label>
                                                <input type="text" name="about_company_mm"
                                                    value="{{ $site_settings['about_company']['value_mm'] }}"
                                                    id="about_company_mm" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <!--About Company EN-->
                                            <div class="col-12">
                                                <label for="mission" class="form-label">Our Mission</label>
                                                <input type="text" name="mission"
                                                    value="{{ $site_settings['mission']['value'] }}" id="mission"
                                                    class="form-control">
                                            </div>
                                            <!--About Company MM-->
                                            <div class="col-12 mt-2">
                                                <label for="mission_mm" class="form-label">Our Mission MM</label>
                                                <input type="text" name="mission_mm"
                                                    value="{{ $site_settings['mission']['value_mm'] }}"
                                                    id="mission_mm" class="form-control">
                                            </div>

                                        </div>
                                        <div class="form-group row mb-3">
                                            <!--Our Vision EN-->
                                            <div class="col-12">
                                                <label for="vision" class="form-label">Our Vision</label>
                                                <input type="text" name="vision"
                                                    value="{{ $site_settings['vision']['value'] }}" id="vision"
                                                    class="form-control">
                                            </div>
                                            <!--Our Vision MM-->
                                            <div class="col-12 mt-2">
                                                <label for="vision_mm" class="form-label">Our Vision MM</label>
                                                <input type="text" name="vision_mm"
                                                    value="{{ $site_settings['vision']['value_mm'] }}" id="vision_mm"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <!--Core Value EN-->
                                            <div class="col-12">
                                                <label for="core_value" class="form-label">Core Value</label>
                                                <textarea type="text" name="core_value" id="core_value" class="form-control" rows="6">{{ $site_settings['core_value']['value'] }}</textarea>
                                            </div>
                                            <!--Core Value MM-->
                                            <div class="col-12">
                                                <label for="core_value_mm" class="form-label">Core Value MM</label>
                                                <textarea type="text" name="core_value_mm" id="core_value_mm" class="form-control" rows="6">{{ $site_settings['core_value']['value_mm'] }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- end about us-->

                                    <div class="tab-pane fade" id="setting-theme-tab" role="tabpanel"
                                        aria-labelledby="setting-theme">
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="pop_up" class="form-label">Pop-Up Image</label>
                                                <input type="file" id="image" name="pop_up"
                                                    data-max-file-size="1000K"
                                                    data-default-file="{{ $site_settings['pop_up']['value'] }}"
                                                    data-allowed-file-extensions='["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"]'
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end col-->
                        </div>
                        @can('edit')
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center mt-3 mb-3">
                                        <button type="submit" class="btn w-sm btn-success waves-effect waves-light">
                                            Update
                                        </button>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Settings</h4>
                <div class="col-lg-6 mb-7 right py-4 flex ml-auto">

                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <form method="post" enctype="multipart/form-data">
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
                                </div>
                            </div> <!-- end col-->
                            <div class="col-md-6 mt-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="setting-general" role="tabpanel"
                                        aria-labelledby="general-tab">
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_name" class="form-label">Site Name</label>
                                                <input type="text" name="site_name"
                                                    value="{{ $site_settings['site_name'] }}" id="site_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_title" class="form-label">Site Title</label>
                                                <input type="text" name="site_title"
                                                    value="{{ $site_settings['site_title'] }}" id="site_title"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="site_url" class="form-label">Site Url</label>
                                                <input type="text" name="site_url"
                                                    value="{{ $site_settings['site_url'] }}" id="site_url"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="header_text" class="form-label">Header Text</label>
                                                <textarea type="text" name="header_text" id="header_text" class="form-control" rows="6">{{ $site_settings['header_text'] }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- end General-->

                                    <div class="tab-pane fade" id="setting-contact-tab" role="tabpanel"
                                        aria-labelledby="setting-contact">
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_email" class="form-label">Email</label>
                                                <input type="text" name="default_email"
                                                    value="{{ $site_settings['default_email'] }}" id="default_email"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_phone_number" class="form-label">Phone
                                                    Number</label>
                                                <input type="text" name="default_phone_number"
                                                    value="{{ $site_settings['default_phone_number'] }}"
                                                    id="default_phone_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_address" class="form-label">Address</label>
                                                <textarea type="text" name="default_address" id="default_address" class="form-control" rows="6">{{ $site_settings['default_address'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_location" class="form-label">Location
                                                    Map(iframe)</label>
                                                <textarea type="text" name="default_location" id="default_location" class="form-control" rows="6">{{ $site_settings['default_location'] }}</textarea>
                                            </div>
                                        </div>
                                    </div><!-- end Contact-->

                                    <!--Facts about company-->
                                    <div class="tab-pane fade" id="setting-fact-tab" role="tabpanel"
                                        aria-labelledby="setting-fact">
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_staffs" class="form-label">Staffs</label>
                                                <input type="text" name="default_staffs"
                                                    value="{{ $site_settings['default_staffs'] }}" id="default_staffs"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_products" class="form-label">Products</label>
                                                <input type="text" name="default_products"
                                                    value="{{ $site_settings['default_products'] }}"
                                                    id="default_products" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_curr_partner" class="form-label">Current
                                                    Partners</label>
                                                <input type="text" name="default_curr_partner"
                                                    value="{{ $site_settings['default_curr_partner'] }}"
                                                    id="default_curr_partner" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="default_dist_region" class="form-label">Distributed
                                                    Region</label>
                                                <input type="text" name="default_dist_region"
                                                    value="{{ $site_settings['default_dist_region'] }}"
                                                    id="default_dist_region" class="form-control">
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
                                                    value="{{ $site_settings['social_facebook'] }}"
                                                    id="social_facebook" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_twitter" class="form-label">Twitter</label>
                                                <input type="text" name="social_twitter"
                                                    value="{{ $site_settings['social_twitter'] }}"
                                                    id="social_twitter" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_instagram" class="form-label">Instagram</label>
                                                <input type="text" name="social_instagram"
                                                    value="{{ $site_settings['social_instagram'] }}"
                                                    id="social_instagram" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <label for="social_linkedin" class="form-label">LinkedIn</label>
                                                <input type="text" name="social_linkedin"
                                                    value="{{ $site_settings['social_linkedin'] }}"
                                                    id="social_linkedin" class="form-control">
                                            </div>
                                        </div>
                                    </div><!-- end Social-->

                                </div>
                            </div> <!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-3 mb-3">
                                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">
                                        Update
                                    </button>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

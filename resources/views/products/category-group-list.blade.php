<x-app-layout>

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Category Group</h4>
                    <div class="col-lg-6 mb-7 right py-4 flex ml-auto">
                        <button type="button" class="btn btn-primary mb-2 float-left btn-icon-text" onclick="{{url('category_create')}}">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New 
                        </button>
                        <button type="button" class="btn btn-danger mb-2 ml-2  float-left btn-icon-text">
                                <i class="mdi mdi-file-upload btn-icon-prepend"></i>Import 
                        </button>
                        <button type="button" class="btn btn-success mb-2  ml-2 float-left btn-icon-text">
                                <i class="mdi mdi-file-download btn-icon-prepend"></i>Export 
                        </button>
                    </div>
                    <div class="table-responsive">
                        <!-- table table-striped -->
                      <table class="table w-full text-xl border-green"> 
                        <thead>
                          <tr>
                            <th>Category Group</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Create At</th>
                            <th>Updated By</th>
                            <th class="justify-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>Arpimune Me-100 Capsule</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td>Arpimune Me - 25 Capsule </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td>Mofetyl 250 Tablet</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
                            </td>
                            <td>Mofetyl 500 Tablet</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>AMK 1000</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td>AMK 156 Oral Suspension</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td>AMK 375</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>16.Feb.2023</td>
                            <td>Admin</td>
                            <td> 
                                <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                 </button>
                                 <button type="button" class="btn btn- btn-icon-text">
                                    <i class="mdi mdi-file-eye btn-icon-append"></i>
                                 </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
</x-app-layout>
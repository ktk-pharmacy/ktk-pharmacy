<x-app-layout>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body tb-card">
                <h4 class="card-title">Content Type List</h4>
                <div class="col-lg-2 mb-7 right py-4 flex ml-auto">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                        data-url="{{ route('content_type_form') }}" class="btn btn-primary btn-icon-text bg-green"
                        id="add_btn">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add New
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" id="modal_container">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- table table-striped -->
                    <table class="table w-full text-xl border-green">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Content Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content_types as $key => $content_type)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ $content_type->name }}</td>
                                    <td class="pl-5">
                                        {{ count($content_type->blogs) }}
                                    </td>
                                    <td>
                                        @if (!in_array($content_type->id, [1, 2]))
                                            <a href="javascript:void(0);" class="mx-2 edit-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-name="{{ $content_type->name }}"
                                                data-url="{{ route('content_type_update', $content_type->id) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                                data-url="{{ route('content_type_destroy', $content_type->id) }}"
                                                class="text-danger delete-btn"><i
                                                    class="fa-solid fa-square-xmark"></i></a>
                                        @endif
                                        {{-- @can('user-edit')
                                            <a href="{{route('user_edit',$user->id)}}" class="mx-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan
                                        @if (!$user->hasrole('Superadmin'))
                                            @can('user-delete')
                                                <a href="javascript:void(0)" data-url="{{route('user_destroy',$user->id)}}"
                                                    class="text-danger delete-btn"><i
                                                        class="fa-solid fa-square-xmark"></i></a>
                                            @endcan
                                        @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        var fetch_form_url = $('#add_btn').data('url');

        $('#add_btn').click(function(e) {
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: fetch_form_url,
                success: function(response) {
                    $('#modal_container').html(response);
                }
            });
        });

        $('.edit-btn').click(function(e) {
            var url = $(this).data('url');
            var name = $(this).data('name');
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: fetch_form_url,
                success: function(response) {
                    $('#modal_container').html(response);

                    $('#name').val(name);
                    $('#content_type_method').val('PATCH');
                    $('#content_type_form').attr('action', url);
                }
            });
        })
    });
</script>

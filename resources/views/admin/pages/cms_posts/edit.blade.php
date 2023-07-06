@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}"><i
          class="fa fa-plus"></i> @lang('Add')</a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    @if (session('errorMessage'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('errorMessage') }}
      </div>
    @endif
    @if (session('successMessage'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('successMessage') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach

      </div>
    @endif

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">@lang('Update form')</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>Thông tin chính <span class="text-danger">*</span></h5>
                </a>
              </li>
              <li>
                <a href="#tab_3" data-toggle="tab">
                  <h5>Bài viết liên quan</h5>
                </a>
              </li>
              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                @lang('Save')
              </button>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Post category') <small class="text-red">*</small></label>
                      <select name="taxonomy_id" id="taxonomy_id" class="form-control select2" style="width:100%">
                        <option value="">@lang('Please select')</option>
                        @foreach ($parents as $item)
                          @if ($item->parent_id == 0 || $item->parent_id == null)
                            <option value="{{ $item->id }}"
                              {{ $detail->taxonomy_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>

                            @foreach ($parents as $sub)
                              @if ($item->id == $sub->parent_id)
                                <option value="{{ $sub->id }}"
                                  {{ $detail->taxonomy_id == $sub->id ? 'selected' : '' }}>- - {{ $sub->title }}
                                </option>

                                @foreach ($parents as $sub_child)
                                  @if ($sub->id == $sub_child->parent_id)
                                    <option value="{{ $sub_child->id }}"
                                      {{ $detail->taxonomy_id == $sub_child->id ? 'selected' : '' }}>- - - -
                                      {{ $sub_child->title }}</option>
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Title') <small class="text-red">*</small></label>
                      <input type="text" class="form-control" name="title" placeholder="@lang('Title')"
                        value="{{ $detail->title }}" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>@lang('Status')</label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="status" value="active"
                            {{ $detail->status == 'active' ? 'checked' : '' }}>
                          <small>@lang('active')</small>
                        </label>
                        <label>
                          <input type="radio" name="status" value="deactive"
                            {{ $detail->status == 'deactive' ? 'checked' : '' }} class="ml-15">
                          <small>@lang('deactive')</small>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>@lang('Is featured')</label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="is_featured" value="1"
                            {{ $detail->is_featured == '1' ? 'checked' : '' }}>
                          <small>@lang('true')</small>
                        </label>
                        <label>
                          <input type="radio" name="is_featured" value="0" class="ml-15"
                            {{ $detail->is_featured == '0' ? 'checked' : '' }}>
                          <small>@lang('false')</small>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>@lang('Order')</label>
                      <input type="number" class="form-control" name="iorder" placeholder="@lang('Order')"
                        value="{{ $detail->iorder }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Image')</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> @lang('choose')
                          </a>
                        </span>
                        <input id="image" class="form-control" type="text" name="image"
                          placeholder="@lang('image_link')..." value="{{ $detail->image }}">
                      </div>
                      <div id="image-holder" style="margin-top:15px;max-height:100px;">
                        @if ($detail->image != '')
                          <img style="height: 5rem;" src="{{ $detail->image }}">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Image thumb')</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a data-input="image_thumb" data-preview="image_thumb-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> @lang('choose')
                          </a>
                        </span>
                        <input id="image_thumb" class="form-control" type="text" name="image_thumb"
                          placeholder="@lang('image_link')..." value="{{ $detail->image_thumb }}">
                      </div>
                      <div id="image_thumb-holder" style="margin-top:15px;max-height:100px;">
                        @if ($detail->image_thumb != '')
                          <img style="height: 5rem;" src="{{ $detail->image_thumb }}">
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 hidden">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="text-danger">@lang('Tags')</label>
                          <select class="form-control select2" id="post_tags" name="json_params[tags][]"
                            multiple="multiple" data-placeholder="Chọn tags..." style="width: 100%;">
                            @isset($tags)
                              @foreach ($tags as $item)
                                <option value="{{ $item->id }}"
                                  {{ isset($detail->json_params->tags) && in_array($item->id, $detail->json_params->tags) ? 'selected' : '' }}>
                                  {{ $item->title }}
                                </option>
                              @endforeach
                            @endisset
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Thêm tags</label>
                          <div class="input-group">
                            <input type="text" id="tags_title" class="form-control pull-right"
                              placeholder="Thêm tags..." autocomplete="off">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-warning btn_add_tags">
                                Thêm
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>URL tùy chọn</label>
                      <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                      <small class="form-text">
                        (
                        <i class="fa fa-info-circle"></i>
                        Maximum 100 characters in the group: "A-Z", "a-z", "0-9" and "-_" )
                      </small>
                      <input name="alias" class="form-control" value="{{ $detail->alias ?? old('alias') }}" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('Description')</label>
                      <textarea name="json_params[brief][vi]" class="form-control" rows="5">{{ isset($detail->json_params->brief->vi) ? $detail->json_params->brief->vi : old('json_params[brief][vi]') }}</textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label>@lang('Content')</label>
                        <textarea name="json_params[content][vi]" class="form-control" id="content_vi">{{ isset($detail->json_params->content->vi) ? $detail->json_params->content->vi : old('json_params[content][vi]') }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('seo_title')</label>
                      <input name="json_params[seo_title]" class="form-control"
                        value="{{ $detail->json_params->seo_title ?? old('json_params[seo_title]') }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('seo_keyword')</label>
                      <input name="json_params[seo_keyword]" class="form-control"
                        value="{{ $detail->json_params->seo_keyword ?? old('json_params[seo_keyword]') }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('seo_description')</label>
                      <input name="json_params[seo_description]" class="form-control"
                        value="{{ $detail->json_params->seo_description ?? old('json_params[seo_description]') }}">
                    </div>
                  </div>
                </div>

              </div>
              <div class="tab-pane " id="tab_3">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="box" style="border-top: 3px solid #d2d6de;">
                      <div class="box-header">
                        <h3 class="box-title">Danh sách tin liên quan</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="col-md-1">ID</th>
                              <th class="col-md-5">Tên</th>
                              <th class="col-md-2">Danh mục</th>
                              <th class="col-md-2">Đăng lúc</th>
                              <th class="col-md-2">Bỏ chọn</th>
                            </tr>
                          </thead>
                          <tbody id="post_related">
                            @isset($relateds)
                              @foreach ($relateds as $item)
                                <tr>
                                  <td>{{ $item->id }}</td>
                                  <td>{{ $item->title }}</td>
                                  <td>{{ $item->taxonomy_title }}</td>
                                  <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                  <td>
                                    <input name="json_params[related_post][]" type="checkbox"
                                      value="{{ $item->id }}" class="mr-15 related_post_item cursor"
                                      autocomplete="off" checked>
                                  </td>
                                </tr>
                              @endforeach
                            @endisset
                          </tbody>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                  <div class="col-xs-6">
                    <div class="box" style="border-top: 3px solid #d2d6de;">
                      <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools col-md-12">
                          <div class="col-md-6">
                            <select class="form-control select2" id="search_taxonomy_id" style="width:100%">
                              <option value="">- Chọn danh mục -</option>
                              @foreach ($parents as $item)
                                @if ($item->parent_id == 0 || $item->parent_id == null)
                                  <option value="{{ $item->id }}">{{ $item->title }}</option>

                                  @foreach ($parents as $sub)
                                    @if ($item->id == $sub->parent_id)
                                      <option value="{{ $sub->id }}">
                                        - -
                                        {{ $sub->title }}
                                      </option>

                                      @foreach ($parents as $sub_child)
                                        @if ($sub->id == $sub_child->parent_id)
                                          <option value="{{ $sub_child->id }}">
                                            - - - -
                                            {{ $sub_child->title }}
                                          </option>
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <div class="input-group col-md-6">
                            <input type="text" id="search_title_post" class="form-control pull-right"
                              placeholder="Tiêu đề bản tin..." autocomplete="off">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default btn_search">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="col-md-1">ID</th>
                              <th class="col-md-5">Tên</th>
                              <th class="col-md-2">Danh mục</th>
                              <th class="col-md-2">Đăng lúc</th>
                              <th class="col-md-2">Chọn</th>
                            </tr>
                          </thead>
                          <tbody id="post_available">

                          </tbody>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                </div>

              </div>
            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
            <i class="fa fa-bars"></i> @lang('List')
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            @lang('Save')</button>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
  <script>
    CKEDITOR.replace('content_vi', ck_options);
    // Change to filter
    $(document).ready(function() {

      // Fill Available Blocks by template
      $(document).on('click', '.btn_search', function() {
        let keyword = $('#search_title_post').val();
        let taxonomy_id = $('#search_taxonomy_id').val();
        let _targetHTML = $('#post_available');
        _targetHTML.html('');
        let checked_post = [];
        $("input:checkbox:checked").each(function() {
          checked_post.push($(this).val());
        });

        let url = "{{ route('cms_posts.search') }}/";
        $.ajax({
          type: "GET",
          url: url,
          data: {
            keyword: keyword,
            taxonomy_id: taxonomy_id,
            other_list: checked_post
          },
          success: function(response) {
            if (response.message == 'success') {
              let list = response.data || null;
              let _item = '';
              if (list.length > 0) {
                list.forEach(item => {
                  _item += '<tr>';
                  _item += '<td>' + item.id + '</td>';
                  _item += '<td>' + item.title + '</td>';
                  _item += '<td>' + item.taxonomy_title + '</td>';
                  _item += '<td>' + formatDate(item.created_at) + '</td> ';
                  _item +=
                    '<td><input name="json_params[related_post][]" type="checkbox" value="' + item.id +
                    '" class="mr-15 related_post_item cursor" autocomplete="off"></td>';
                  _item += '</tr>';
                });
                _targetHTML.html(_item);
              }
            } else {
              _targetHTML.html('<tr><td colspan="5">' + response.message + '</td></tr>');
            }
          },
          error: function(response) {
            // Get errors
            let errors = response.responseJSON.message;
            _targetHTML.html('<tr><td colspan="5">' + errors + '</td></tr>');
          }
        });
      });

      // Checked and unchecked item event
      $(document).on('click', '.related_post_item', function() {
        let ischecked = $(this).is(':checked');
        let _root = $(this).closest('tr');
        let _targetHTML;

        if (ischecked) {
          _targetHTML = $("#post_related");
        } else {
          _targetHTML = $("#post_available");
        }
        _targetHTML.append(_root);
      });

      /** Add tags */
      $(".btn_add_tags").click(function() {
        var tags = $("#tags_title").val();
        if (tags.trim() == '') return;
        var _url = "{{ route('cms_posts.add_tag') }}";
        $.ajax({
          type: "POST",
          url: _url,
          data: {
            tags: tags,
            _token: "{{ csrf_token() }}"
          },
          cache: false,
          context: document.body,
          success: function(response) {
            var obj = response.data;
            var appendContent;
            if (obj.exist) {
              /** Tags is exist in DB */
              $("#post_tags option[value='" + obj.id + "']").prop('selected', true);
            } else if (!obj.exist) {
              /** Tags is created */
              appendContent = '<option value="' + obj.id + '" selected>' + obj.title + '</option>';
              $("#post_tags").append(appendContent);
            } else {
              console.log("Has error in progress update DB");
            }
            $("#post_tags").select2();
            $("#tags_title").val("");
          },
          error: function(response) {
            // Get errors
            let errors = response.responseJSON.message;
            alert(errors);
          }
        });
      });
      $("#tags_title").keypress(function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
          // Cancel the default action, if needed
          event.preventDefault();
          $(".btn_add_tags").click();
        }
      });

    });
  </script>
@endsection

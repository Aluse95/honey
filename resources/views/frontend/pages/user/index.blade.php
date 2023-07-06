@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp

@section('content')
  Print all content by [module - route - page] without blocks content at here

  <section id="page-title" class="page-title-pattern" style="background-image: url({{ $image_background }});">
    <div class="container clearfix">
      <h1>{{ $page_title }}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
      </ol>
    </div>
  </section>

  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="row clearfix">
          <div class="col-12">

            <img src="{{ asset('themes/frontend/bacha/images/icons/avatar.jpg') }}"
              class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">

            <div class="heading-block border-0">
              <h3>{{ $detail->name ?? '' }}</h3>
              <span>
                {{ __('Affiliate code') . ': ' . $detail->affiliate_code ?? '' }}
              </span>
              <span>
                {{ __('Affiliate link') . ': ' }}
                <a href="{{ route('frontend.affiliate', ['affiliate_code' => $detail->affiliate_code]) }}"
                  target="_blank" rel="noopener noreferrer">
                  {{ route('frontend.affiliate', ['affiliate_code' => $detail->affiliate_code]) }}
                </a>
              </span>
            </div>

            <div class="clear"></div>

            <div class="row clearfix">
              <div class="col-lg-12">
                <div class="tabs tabs-alt clearfix" id="tabs-profile">
                  <ul class="tab-nav clearfix">
                    <li><a href="#tab-general"><i class="icon-user"></i> @lang('General information')</a></li>
                    <li><a href="#tab-history"><i class="icon-history"></i> @lang('Point history')</a></li>
                    <li><a href="#tab-withdraw"><i class="icon-wallet1"></i> @lang('Withdraw history')</a></li>
                  </ul>
                  <div class="tab-container">
                    <div class="tab-content clearfix" id="tab-general">
                      <div class="row">
                        <div class="col-md-6">
                          <ul class="list-group">
                            <li class="list-group-item">
                              @lang('Username'):
                              <strong class="float-end">{{ $detail->email ?? '' }}</strong>
                            </li>
                            <li class="list-group-item">
                              @lang('Affiliate agent'):
                              <strong class="float-end">{{ $detail->affiliate_agent ?? '' }}</strong>
                            </li>
                            <li class="list-group-item">
                              @lang('Total point earned'):
                              <strong class="float-end">
                                {{ number_format($detail->total_score + $detail->total_payment) }}
                              </strong>
                            </li>
                            <li class="list-group-item">
                              @lang('Total money earned'):
                              <strong class="float-end">
                                {{ number_format($detail->total_money + $detail->total_payment) }}
                              </strong>
                            </li>
                            <li class="list-group-item">
                              @lang('Total payment'):
                              <strong class="float-end">{{ number_format($detail->total_payment) }}</strong>
                            </li>
                            <li class="list-group-item">
                              @lang('Total point available'):
                              <strong class="float-end">{{ number_format($detail->total_score) }}</strong>
                            </li>
                            <li class="list-group-item">
                              @lang('Total money available'):
                              <strong class="float-end">{{ number_format($detail->total_money) }}</strong>
                            </li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <p class="mb-1">
                            @lang('Minimum amount per withdrawal'):
                            <strong class="text-danger">
                              {{ number_format(\App\Consts::WITHDRAW_MIN) }}
                            </strong>
                          </p>
                          <p class="mb-3">
                            @lang('Maximum amount you can withdraw'):
                            <strong class="text-success">
                              {{ number_format($detail->total_money) }}
                            </strong>
                          </p>
                          <form class="row" method="POST" action="{{ route('frontend.user.withdraw') }}">
                            @csrf
                            <div class="col-12 form-group">
                              <div class="row">
                                <div class="col-sm-4 col-form-label">
                                  <label for="money">@lang('Amount withdraw'):</label>
                                </div>
                                <div class="col-sm-8">
                                  <input type="number" class="sm-form-control" id="money" name="money"
                                    step="{{ \App\Consts::WITHDRAW_MIN }}" min="{{ \App\Consts::WITHDRAW_MIN }}"
                                    max="{{ $detail->total_money }}"
                                    value="{{ old('money') ?? \App\Consts::WITHDRAW_MIN }}" />
                                </div>
                              </div>
                            </div>
                            <div class="col-12 form-group">
                              <div class="row">
                                <div class="col-sm-4 col-form-label">
                                  <label for="description">@lang('Bank information'):</label>
                                </div>
                                <div class="col-sm-8">
                                  <textarea class="sm-form-control" id="description" name="description" rows="5" cols="30"
                                    placeholder="@lang('Bank information')">{{ old('description') }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 form-group">
                              <button type="submit" class="button button-3d m-0">@lang('Submit withdraw')</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content clearfix" id="tab-history">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>@lang('Is type')</th>
                              <th>@lang('Order total money')</th>
                              <th>@lang('Affiliate percent')</th>
                              <th>@lang('Affiliate point')</th>
                              <th>@lang('Affiliate money')</th>
                              <th>@lang('Status')</th>
                              <th>@lang('Created at')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($affiliate_historys as $item)
                              <tr>
                                <td>
                                  {{ $loop->index + 1 }}
                                </td>
                                <td>
                                  @lang($item->is_type)
                                </td>
                                <td>
                                  {{ number_format($item->order_total_money) }}
                                </td>
                                <td>
                                  {{ $item->affiliate_percent }} %
                                </td>
                                <td>
                                  {{ number_format($item->affiliate_point) }}
                                </td>
                                <td>
                                  {{ number_format($item->affiliate_money) }}
                                </td>
                                <td>
                                  @lang($item->status)
                                </td>
                                <td>
                                  {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d/m/Y') }}
                                </td>
                              </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>


                    </div>
                    <div class="tab-content clearfix" id="tab-withdraw">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>@lang('Withdraw amount')</th>
                              <th>@lang('Bank information')</th>
                              <th>@lang('Admin note')</th>
                              <th>@lang('Status')</th>
                              <th>@lang('Created at')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($affiliate_payments as $item)
                              <tr>
                                <td>
                                  {{ $loop->index + 1 }}
                                </td>
                                <td>
                                  {{ number_format($item->money) }}
                                </td>
                                <td>
                                  {!! nl2br($item->description) !!}
                                </td>
                                <td>
                                  {!! nl2br($item->json_params->admin_note ?? '') !!}
                                </td>
                                <td>
                                  @lang($item->status)
                                </td>
                                <td>
                                  {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d/m/Y') }}
                                </td>
                              </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>


                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

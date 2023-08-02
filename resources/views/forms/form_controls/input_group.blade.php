@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Input groups</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Form Controls</li>
            <li class="breadcrumb-item active"> Input groups</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Basic Input groups</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="mb-3 m-form__group">
                                    <label class="form-label">Left Addon</label>
                                    <div class="input-group"><span class="input-group-text">@</span>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Right Addon</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Recipient's username"
                                            aria-label="Recipient's username"><span
                                            class="input-group-text">@example.com</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Joint Addon</label>
                                    <div class="input-group"><span class="input-group-text">0.00</span>
                                        <input class="form-control" type="number"
                                            aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Left & Right Addon</label>
                                    <div class="input-group mb-3 leftright-radius"><span class="input-group-text">0.00
                                        </span>
                                        <input class="form-control" type="number"
                                            aria-label="Amount (to the nearest dollar)"><span
                                            class="input-group-text">0.00 </span>
                                    </div>
                                </div>
                                <div class="mb-3 input-group-solid">
                                    <label class="form-label">Solid style</label>
                                    <div class="input-group"><span class="input-group-text">@ </span>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="mb-3 input-group-square">
                                    <label class="form-label">Square style</label>
                                    <div class="input-group left-radius"><span class="input-group-text">+</span>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="mb-3 input-group-square">
                                    <label class="form-label">Raise style</label>
                                    <div class="input-group input-group-air left-radius"><span
                                            class="input-group-text">#</span>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Left & Right Addon</label>
                                    <div class="input-group mb-3 leftright-radius"><span class="input-group-text"><i class="icofont icofont-ui-zoom-out"></i>
                                        </span>
                                        <input class="form-control" type="number"
                                            aria-label="Amount (to the nearest dollar)"><span
                                            class="input-group-text">$</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary m-r-15" type="submit">Submit</button>
                    <button class="btn btn-light" type="submit">Cancel</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Basic Input groups</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="mb-3 m-form__group">
                                    <label class="form-label">Left Addon</label>
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="icofont icofont-pencil-alt-5"></i></span>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Right Addon</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Recipient's username"
                                            aria-label="Recipient's username"><span class="input-group-text"><i
                                                class="icofont icofont-ui-user"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Joint Addon</label>
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="icofont icofont-unlink"></i></span><span
                                            class="input-group-text rounded-0">0.00 </span>
                                        <input class="form-control" type="number"
                                            aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Left & Right Addon</label>
                                    <div class="input-group mb-3 leftright-radius"><span class="input-group-text"><i
                                                class="icofont icofont-ui-zoom-out"> </i></span>
                                        <input class="form-control" type="text"
                                            aria-label="Amount (to the nearest dollar)"><span
                                            class="input-group-text"><i class="icofont icofont-ui-zoom-in">
                                            </i></span>
                                    </div>
                                </div>
                                <div class="mb-3 input-group-solid">
                                    <label class="form-label">Solid style</label>
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="icofont icofont-users"> </i></span>
                                        <input class="form-control" type="text" placeholder="999999">
                                    </div>
                                </div>
                                <div class="mb-3 input-group-square">
                                    <label class="form-label">Flat style</label>
                                    <div class="input-group left-radius"><span class="input-group-text"><i
                                                class="icofont icofont-credit-card"> </i></span>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="mb-3 input-group-square">
                                    <label class="form-label">Raise style</label>
                                    <div class="input-group left-radius"><span class="input-group-text"><i
                                                class="icofont icofont-download"> </i></span>
                                        <input class="form-control input-group-air" type="text"
                                            placeholder="https://www.example.com">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Left & Right Addon</label>
                                    <div class="input-group pill-input-group leftright-radius"><span
                                            class="input-group-text"><i class="icofont icofont-ui-copy"> </i></span>
                                        <input class="form-control" type="text"
                                            aria-label="Amount (to the nearest dollar)"><span
                                            class="input-group-text"><i class="icofont icofont-stock-search">
                                            </i></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary m-r-15" type="submit">Submit</button>
                    <button class="btn btn-light" type="submit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection


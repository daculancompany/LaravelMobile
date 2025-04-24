@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content"
	style="font-size: 0.7rem !important">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">

				<div class="col-sm-6" style="font-size: 30px !important">
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item">
							<a href="#" onclick="history.back();">
								<!-- <i class="fa fa-angle-double-left"></i> BACK -->
								<i class="fas fa-search"></i>
								MATERIAL MASTER
							</a>
						</li>
					</ol>
				</div>
				<div class="col-sm-6" style="font-size: 30px !important">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('mm_index') }}">MM</a></li>
						<li class="breadcrumb-item"><a href="{{ route('pr_index') }}">PR</a></li>
						<li class="breadcrumb-item active"><a href="{{ route('po_index') }}">PO</a></li>
						<li class="breadcrumb-item"><a href="{{ route('gm_index') }}">GM</a></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<div class="row">
		<!-- Default box -->
		<div class="col-7">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">MATERIAL INFORMATION</h3>
					<div class="card-tools">
					</div>
				</div>
				<div class="card-body ">
					<div class="form-group row m-1">
						<label for="mmtype" class="col-sm-2 col-form-label  p-0">TYPE</label>
						<label for="mmlabel" class="col-sm-1 col-form-label text-center p-0 " style="min-width:60px;">
							({{ $mm->MTART  }})
						</label>
						<label for="mmdescription" class="col-sm-4 col-form-label text-center p-0" style="min-width:60px;">
							{{ $mm->MatDesc->MTBEZ  }}
						</label>
					</div>
					<div class="form-group h22 row m-1">
						<label for="mmoldstockcode" class="col-sm-2 col-form-label pl-0  pr-0">OLD STOCK CODE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control p-0  text-center " id="mmoldstockcode" value="{{   $mm->BISMT  }}" readonly />
						</div>
					</div>
					<div class="form-group h22 row m-1">
						<label for="mmcode" class="col-sm-2 col-form-label pl-0  pr-0">CODE</label>
						<div class="col-sm-4">
							<input type="text" class="form-control p-0 text-center" id="mmcode" value="{{ (int) $mm->MATNR  }}" readonly />
						</div>
					</div>
					<div class="form-group h22 row m-1">
						<label for="description" class="col-sm-2 col-form-label  pl-0 pr-0">DESCRIPTION</label>
						<div class="col-sm-10">
							<input type="text" class="form-control  p-0" id="description" value="{{ $makt->MAKTX}}" readonly />
						</div>
					</div>
					<div class="form-group  h22 row m-1">
						<label for="mmunit" class="col-sm-2 col-form-label  pl-0  pr-0">UNIT</label>
						<div class="col-sm-1">
							<input type="text" class="form-control  p-0  pr-0 text-center" id="unit" value="{{ $mm->MEINS}}" readonly />
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control  p-0  pr-0  " id="unitdescription" value="{{ $mm->UnitDesc->MSEHL }}" readonly />
						</div>
					</div>
					<div class="form-group h22 row m-1">
						<label for="mmgroup" class="col-sm-2 col-form-label  pl-0  pr-0">GROUP</label>
						<div class="col-sm-1">
							<input type="text" class="form-control  p-0  pr-0 text-center" id="group" value="{{ $mm->MATKL }}" readonly />
						</div>
						<div class="col-sm-9">
							<input type="text" class="form-control  p-0  pr-0" id="groupdescription" value="{{ $mm->GroupDesc->WGBEZ60 }}" readonly />
						</div>
					</div>
					<div class="form-group h22 row m-1">
						<label for="mmstatus" class="col-sm-2 col-form-label  pl-0  pr-0">STATUS </label>
						<div class="col-sm-3">
							<input type="text" class="form-control  p-0  pr-0" id="group" value="{{ $mm->LVORM }}" readonly />
						</div>
					</div>
					<div class="form-group h22 row m-1">
						<label for="mmaverage" class="col-sm-2 col-form-label  pl-0  pr-0">AVERAGE PRICE</label>
						<div class="col-sm-3">
							<input type="text" class="form-control  p-0  pr-0 text-center" id="average" value="{{ number_format($mm->AvgPrice->VERPR ?? 0,2) }}" readonly />
						</div>
					</div>
					<div class="form-group row m-1">
						<div class="col-sm-8 ml-0 pl-0">
							<div class="row m-1">
								<label for="mmvaluation" class="col-sm-3 col-form-label  pl-0  pr-1">VALUATION</label>
								<div class="col-sm-3">
									<input type="text" class="form-control  p-0  pr-0  text-center" id="valuation" value="{{ $mm->AvgPrice->BKLAS ?? '' }}" readonly />
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control  p-0  pr-0" id="valuationdescr" value="{{ $mm->AvgPrice ?  $mm->AvgPrice->ValDesc->BKBEZ : '' }}" readonly />
								</div>
							</div>
							<div class="row m-1">
								<label for="longdescription" class="col-sm-3 col-form-label  pl-0  pr-0">LONG DESCRIPTION</label>
								<div class="col-sm-9 ">
									<!-- <input type="text" class="form-control  p-0  pr-0" id="longdescription" readonly/> -->
									<textbox rows="15" class="form-control p-0 pr-0" id="longdesc"
										style="height: 100px; overflow: auto;font-size:15px;"
										readonly>
										{{ $longtext->LongDescription ?? "" }}
									</textbox>
								</div>
							</div>
							<div class="row m-1">
								<label for="basedinq" class="col-sm-3 col-form-label  pl-0  pr-0">DESCRIPTION BASED IN INQ</label>
								<div class="col-sm-9 ">
									<textbox class="form-control p-0 pr-0" id="basedinq" style="height: 100px;"
										style="height: 100px; overflow: auto;font-size:15px;"
										readonly>
										{{ $m10->St_desc ?? "" }}
									</textbox>
									<!-- <input type="text" class="form-control  p-0  pr-0" id="longdescription" readonly/> -->
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="col-sm-12"> <!-- start table tab -->
								<div class="card card-primary card-outline card-outline-tabs">
									<div class="card-header p-0 border-bottom-0">
										<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
											<!-- {{ $active = 0 }} -->
											@if($dibelec->count() != 0)
											<!-- {{ $active = $active + 1 }} -->
											<li class="nav-item">
												<a class="nav-link {{ $active == 1 ? 'active' : '' }} m-0 p-1" id="tab-ele" data-toggle="pill" href="#tab-for-ele" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
													ELE</a>
											</li>
											@endif
											@if($dibmech->count() != 0)
											<!-- {{ $active = $active + 1 }} -->
											<li class="nav-item">
												<a class="nav-link {{ $active == 1 ? 'active' : '' }} m-0 p-1" id="tab-mec" data-toggle="pill" href="#tab-for-mec" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">
													MEC</a>
											</li>
											@endif
											@if($dibmth->count() != 0)
											<!-- {{ $active = $active + 1 }} -->
											<li class="nav-item">
												<a class="nav-link {{ $active == 1 ? 'active' : '' }} m-0 p-1" id="tab-mth" data-toggle="pill" href="#tab-for-mth" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">
													MTH</a>
											</li>
											@endif
											@if($dibpln->count() != 0)
											<!-- {{ $active = $active + 1 }} -->
											<li class="nav-item ">
												<a class="nav-link  {{ $active == 1 ? 'active' : '' }} m-0 p-1" id="tab-pln" data-toggle="pill" href="#tab-for-pln" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">
													PLN</a>
											</li>
											@endif
											@if($dibsnt->count() != 0)
											<!-- {{ $active = $active + 1 }} -->
											<li class="nav-item ">
												<a class="nav-link {{ $active == 1 ? 'active' : '' }} m-0 p-1" id="tab-snt" data-toggle="pill" href="#tab-for-snt" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">
													SNT</a>
											</li>
											@endif
											<li class="nav-item ">
												<div class="m-0 p-1">
													<small>Forwarded Balance</small> <span class="text-right"> {{ number_format($beg_bal,2) }}</span>
												</div>
											</li>

										</ul>
									</div>

									<div class="card-body m-0 p-0">
										<div class="tab-content" id="custom-tabs-four-tabContent">
											<!-- {{ $active2 = 0 }} -->
											@if($dibelec->count() != 0)
											<!-- {{ $active2 = $active2 + 1 }} -->
											<div class="tab-pane fade show {{ $active2 == 1 ? 'active' : '' }}" id="tab-for-ele" role="tabpanel" aria-labelledby="ctab-for-ele">
												<table class="table table-bordered table-hover table-head-fixed">
													<thead>
														<tr>
															<th class="p-0">Delivery</th>
															<th class="p-0">Issuance</th>
															<!-- <th class="p-0">Balance</th>  -->
															<th class="p-0">Balance</th>
														</tr>
													</thead>
													<tbody>
														<!-- {{ $eletot = 0 }}  -->
														@foreach ($dibelec as $dib)
														<tr>
															<td class="p-0 text-center">{{ $dib->BWART == "101" ? number_format($dib->MENGE,2) : "" }}</td>
															<td class="p-0 text-center">{{ $dib->BWART == "201" || $dib->BWART == "261" ? number_format($dib->MENGE,2) : "" }}</td>
															<!-- <td class="p-0">{{ $dib->WEMPF }}</td> -->
															<td class="p-0 text-center">
																@if ($dib->BWART == "101")
																{{ $eletot += $dib->MENGE }}
																@else
																{{ $eletot -= $dib->MENGE }}
																@endif
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											@endif
											@if($dibmech->count() != 0)
											<!-- {{ $active2 = $active2 + 1 }} -->
											<div class="tab-pane fade show {{ $active2 == 1 ? 'active' : '' }} " id="tab-for-mec" role="tabpanel" aria-labelledby="ctab-for-ele">
												<table class="table table-bordered table-hover table-head-fixed">
													<thead>
														<tr>
															<th class="p-0 text-center">Delivery</th>
															<th class="p-0 text-center">Issuance</th>
															<!-- <th class="p-0">Balanc	e</th>  -->
															<th class="p-0 text-center">Balance</th>
														</tr>
													</thead>
													<tbody>
														<!-- {{ $mechtot = 0 }}  -->
														@foreach ($dibmech as $dib)
														<tr>
															<td class="p-0 text-center">{{ $dib->BWART == "101" ? number_format($dib->MENGE,2) : "" }}</td>
															<td class="p-0 text-center">{{ $dib->BWART == "201" || $dib->BWART == "261" ? number_format($dib->MENGE,2) : "" }}</td>
															<!-- <td class="p-0">{{ $dib->WEMPF }}</td> -->
															<td class="p-0 text-center">
																@if ($dib->BWART == "101")
																{{ $mechtot += $dib->MENGE }}
																@else
																{{ $mechtot -= $dib->MENGE }}
																@endif
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											@endif
											@if($dibmth->count() != 0)
											<!-- {{ $active2 = $active2 + 1 }} -->
											<div class="tab-pane fade show  {{ $active2 == 1 ? 'active' : '' }}" id="tab-for-mth" role="tabpanel" aria-labelledby="ctab-for-ele">
												<table class="table table-bordered table-hover table-head-fixed">
													<thead>
														<tr>
															<th class="p-0 text-center">Delivery</th>
															<th class="p-0 text-center">Issuance</th>
															<!-- <th class="p-0">Balance</th>  -->
															<th class="p-0 text-center">Balance</th>
														</tr>
													</thead>
													<tbody>
														<!-- {{ $mthtot = 0 }}  -->
														@foreach ($dibmth as $dib)
														<tr>
															<td class="p-0 text-center">{{ $dib->BWART == "101" ? number_format($dib->MENGE,2) : "" }}</td>
															<td class="p-0 text-center">{{ $dib->BWART == "201" || $dib->BWART == "261" ? number_format($dib->MENGE,2) : "" }}</td>
															<!-- <td class="p-0">{{ $dib->WEMPF }}</td> -->
															<td class="p-0 text-center">
																@if ($dib->BWART == "101")
																{{ $mthtot += $dib->MENGE }}
																@else
																{{ $mthtot -= $dib->MENGE }}
																@endif
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											@endif
											@if($dibpln->count() != 0)
											<!-- {{ $active2 = $active2 + 1 }} -->
											<div class="tab-pane fade show  {{ $active2 == 1 ? 'active' : '' }}" id="tab-for-pln" role="tabpanel" aria-labelledby="ctab-for-ele">
												<table class="table table-bordered table-hover table-head-fixed">
													<thead>
														<tr>
															<th class="p-0 text-center">Delivery</th>
															<th class="p-0 text-center">Issuance</th>
															<!-- <th class="p-0">Balance</th>  -->
															<th class="p-0 text-center">Balance</th>
														</tr>
													</thead>
													<tbody>
														<!-- {{ $plntot = 0 }}  -->
														@foreach ($dibpln as $dib)
														<tr>
															<td class="p-0 text-center">{{ $dib->BWART == "101" ? number_format($dib->MENGE,2) : "" }}</td>
															<td class="p-0 text-center">{{ $dib->BWART == "201" || $dib->BWART == "261" ? number_format($dib->MENGE,2) : "" }}</td>
															<!-- <td class="p-0">{{ $dib->WEMPF }}</td> -->
															<td class="p-0 text-center">
																@if ($dib->BWART == "101")
																{{ $plntot += $dib->MENGE  }}
																@else
																{{ $plntot -= $dib->MENGE }}
																@endif
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											@endif
											@if($dibsnt->count() != 0)
											<!-- {{ $active2 = $active2 + 1 }} -->
											<div class="tab-pane fade show  {{ $active2 == 1 ? 'active' : '' }}" id="tab-for-snt" role="tabpanel" aria-labelledby="ctab-for-ele">
												<table class="table table-bordered table-hover table-head-fixed">
													<thead>
														<tr>
															<th class="p-0 text-center">Delivery</th>
															<th class="p-0 text-center">Issuance</th>
															<!-- <th class="p-0">Balance</th>  -->
															<th class="p-0 text-center">Balance</th>
														</tr>
													</thead>
													<tbody>
														<!-- {{ $snttot = 0 }}  -->
														@foreach ($dibsnt as $dib)
														<tr>
															<td class="p-0 text-center">{{ $dib->BWART == "101" ? number_format($dib->MENGE,2) : "" }}</td>
															<td class="p-0 text-center">{{ $dib->BWART == "201" || $dib->BWART == "261" ? number_format($dib->MENGE,2) : "" }}</td>
															<!-- <td class="p-0">{{ $dib->WEMPF }}</td> -->
															<td class="p-0 text-center">
																@if ($dib->BWART == "101")
																{{ $snttot += $dib->MENGE  }}
																@else
																{{ $snttot -= $dib->MENGE }}
																@endif
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											@endif
										</div>

									</div>
									<!-- /.card -->
								</div>
							</div> <!-- /start table tab -->
						</div>

					</div>

				</div>
				<!-- /.card-body -->
				<div class="card-footer">

				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
		</div>
		<div class="col-5">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">STOCK DETAILS</h3>
					<div class="card-tools">

					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<div class="form-group row m-1">
								<label for="unrestriceted" class="col-sm-4 col-form-label pl-0  pr-0"></label>
								<div class="col-sm-8">
								</div>
							</div>
							<div class="form-group row m-1">
								<label for="unrestriceted" class="col-sm-6 col-form-label pl-0  pr-0 text-right">UNRESTRICTED</label>
								<div class="col-sm-6">
									<input type="text" class="form-control p-0 text-center" id="unrestriceted" value="{{ number_format($U_QTY,2) }}" readonly />
								</div>
							</div>
							<div class="form-group row m-1">
								<label for="quality_inspection" class="col-sm-6 col-form-label pl-0  pr-0 text-right">QUALITY INSPECTION</label>
								<div class="col-sm-6">
									<input type="text" class="form-control p-0 text-center" id="quality_inspection" value="{{ number_format($QI_QTY,2) }}" readonly />
								</div>
							</div>
							<div class="form-group row m-1">
								<label for="non_valuated" class="col-sm-6 col-form-label pl-0 pr-0 text-right">NON VALUATED</label>
								<div class="col-sm-6">
									<input type="text" class="form-control p-0 text-center" id="non_valuated" value="{{ number_format($NV_QTY,2) }}" readonly />
								</div>
							</div>
							<div class="form-group row m-1">
								<label for="total" class="col-sm-6 col-form-label pl-0  pr-0 text-right ">TOTAL</label>
								<div class="col-sm-6">
									<input type="text" class="form-control p-0 text-center" id="total" value="{{ number_format($TOT_QTY,2) }}" readonly />
								</div>
							</div>
						</div>
						<div class="col-6">
							<!-- <label for="total" class="col-sm-12 col-form-label pl-0  pr-0" >LAST DELIVERY INFORMATION</label>
						<div class="row b-1"> 
						</div> -->
							<div class="card">
								<div class="card-header">
									<span class="text-center">LAST DELIVERY INFORMATION</span>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<div class="card-body p-1">
									<div class="form-group row m-1">
										<label for="documentno" class="col-sm-6 text-right col-form-label pl-0  pr-0">DOCUMENT NO</label>
										<div class="col-sm-6">
											<input type="text" class="form-control p-0" id="documentno" value="{{  $mm->LastDoc->first()->MBLNR ?? '' }}" readonly />
										</div>
									</div>
									<div class="form-group row m-1">
										<label for="postingdate" class="col-sm-6 text-right col-form-label pl-0  pr-0">POSTING DATE</label>
										<div class="col-sm-6">
											<input type="text" class="form-control p-0" id="postingdate" value="{{ $mm->LastDoc->first()->HeaderInfoMM->BUDAT ?? ''  }}" readonly />

										</div>

									</div>
									<div class="form-group row m-1">
										<label for="requestor" class="col-sm-6 text-right col-form-label pl-0  pr-0">REQUESTOR</label>
										<div class="col-sm-6">
											<input type="text" class="form-control p-0" id="requestor" value="{{ $mm->LastDoc->first()->WEMPF ?? '' }}" readonly />
										</div>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header p-0 row">
									<div class="col-2"></div>
									<div class="col-8">
										<h6 class="text-center">
											STORAGE BY LOCATION
										</h6>
									</div>
									<div class="col-2"></div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<table class="table table-sm">
										<thead>
											<tr>
												<th>SLOC</th>
												<th>UNRESTRICTED</th>
												<th>QUALITY INSPECTION</th>
												<th>NON VALUATED</th>
											</tr>
										</thead>
										<tbody>
											@foreach($mm->SLoc as $sloc)
											<tr>
												<td>
													{{ $sloc->LGORT }} &nbsp;
													{{ $sloc->SLocDesc->LGOBE }}
												</td>
												<td>
													{{ number_format($sloc->LABST, 2, '.', ',')   }}
												</td>
												<td>
													{{ number_format($sloc->INSME , 2, '.', ',')  }}
												</td>
												<td>
													{{ number_format($sloc->KLABS , 2, '.', ',') }}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
						</div> <!-- /col-12 -->
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">

				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->

		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">TRANSACTIONS</h3>
					<div class="card-tools">

					</div>
				</div>
				<div class="card-body ">
					<div class="row">
						<div class="col-sm-3 col-3"> <!-- PR -->
							<div class="card">
								<div class="card-header p-0">
									<h3 class="card-title ">
										<span class="badge badge-info">
											PR
										</span>
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-1 scrollCard">
									<table class="table table-striped  table-sm">
										<thead>
											<tr>
												<th class="pl-0">NUMBER</th>
												<th>DATE</th>
												<th>DEPT</th>
												<th>QTY</th>
												<th>STATUS</th>
											</tr>
										</thead>
										<tbody>
											@foreach($mm->PR->sortby("BADAT") as $pr)
											<tr>
												<td class="pl-0">
													<a href="{{ route('pr_details') . '?pr='.   (int) $pr->BANFN }}">
														{{ (int) $pr->BANFN }}
													</a>
												</td>
												<td>{{ $pr->BADAT }}</td>
												<td>{{ $pr->AFNAM }}</td>
												<td>{{ number_format($pr->MENGE, 2, '.', ',') }} </td>
												<td>
													@if($pr->BANPR == "01")
													<span>Version in Process</span>
													@elseif($pr->BANPR == "02")
													<span>Active</span>
													@elseif($pr->BANPR == "03")
													<span>In Release</span>
													@elseif($pr->BANPR == "04")
													<span>For Overall Release</span>
													@elseif($pr->BANPR == "05")
													<span>Release Completed</span>
													@else
													<span>Release Refused</span>
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
						<div class="col-sm-3  col-3"> <!-- PO -->
							<div class="card">
								<div class="card-header  p-0">
									<h3 class="card-title ">
										<span class="badge bg-info">
											PO
										</span>
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-1 scrollCard">
									<table class="table table-striped  table-sm">
										<thead>
											<tr>
												<th class="pl-0">NUMBER</th>
												<th>DATE</th>
												<th>DEPT</th>
												<th>QTY</th>
												<th>STATUS</th>
											</tr>
										</thead>
										<tbody>
											@foreach($mm->PO->where('BANFN',"<>", "")->sortby('BANFN')->sortby('EBELN') as $po)
												<tr>
													<td class="pl-0">
														<a href="{{ route('po_details') . '?pr='.   (int) $po->BANFN }}">
															{{ (int) $po->BANFN }}
														</a>
													</td>
													<td>{{ $po->EBELN }} </td>
													<td>{{ $po->HeaderInfo->BEDAT }}</td>
													<td>{{ $po->AFNAM }}</td>
													<td>

														@if($po->PR->BANPR == "01")
														<span>Version in Process</span>
														@elseif($po->PR->BANPR == "02")
														<span>Active</span>
														@elseif($po->PR->BANPR == "03")
														<span>In Release</span>
														@elseif($po->PR->BANPR == "04")
														<span>For Overall Release</span>
														@elseif($po->PR->BANPR == "05")
														<span>Release Completed</span>
														@else
														<span>Release Refused</span>
														@endif
													</td>
												</tr>
												@endforeach
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
						<div class="col-sm-4  col-4">
							<div class="card table-responsive">
								<div class="card-header  p-0">
									<h3 class="card-title">
										<span class="badge bg-info">
											GR
										</span>
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-1 scrollCard">
									<table class="table table-striped  table-sm">
										<thead>
											<tr>
												<th class="pl-0">DOC NO</th>
												<th>PO NO</th>
												<th>DATE</th>
												<th>DEPT</th>
												<th>QTY</th>
												<th>STATUS</th>
											</tr>
										</thead>
										<tbody>
											@foreach($mm->GR->sortby('EBELN') as $gr)
											<tr>
												<td class="pl-0">
													<a href="{{ route('gm_md') . '?docnum='.   (int) $gr->MBLNR }}">
														{{ $gr->MBLNR }}
													</a>
												</td>
												<td>{{ $gr->EBELN }}</td>
												<td>{{ $gr->HeaderInfoMM->BUDAT }}</td>
												<td>{{ $gr->WEMPF }}</td>
												<td>{{ number_format($gr->MENGE,2) ?? "" }}</td>
												<td>
													<!-- {{ substr($gr->MBLNR, 0, 2) . "-" . intval(substr($gr->MBLNR, 2, 8)) }}											
													{{$gr->HeaderInfoMM->XBLNR}}
													{{ $gr->BWART == "101" ? ( $gr->HeaderInfoMM->XBLNR == (substr($gr->MBLNR, 0, 2) . "-" . intval(substr($gr->MBLNR, 2, 8)))? "Unrestricted" : "Quality Inspection") : "" }} -->
													{{ getMaterialStatus($gr->BWART, $gr->MBLNNR,$gr->HeaderInfoMM->XBLNR   )}}

												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
						<div class="col-sm-2  col-2"> <!-- PO -->
							<div class="card table-responsive">
								<div class="card-header p-0">
									<h3 class="card-title">
										<span class="badge badge-info">
											MRIS
										</span>
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-1 scrollCard">
									<table class="table table-striped table-sm block">
										<thead>
											<tr>
												<th class="pl-0">DOC NO</th>
												<th>DATE</th>
												<th>DEPT</th>
												<th>QTY</th>
											</tr>
										</thead>
										<!-- //8010478 -->
										<tbody>
											@foreach($mm->MRIS->sortby('MBLNR') as $mris)
											<tr>
												<td class="pl-0">
													<a href="{{ route('gm_md') . '?docnum='.   (int) $mris->MBLNR }}">
														{{ $mris->MBLNR }}
													</a>
												</td>
												<td>{{ $mris->HeaderInfoMM->BUDAT }}</td>
												<td>{{ $mris->WEMPF }}</td>
												<td>{{ number_format($mris->MENGE,2) ?? "" }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
					</div><!--/ row -->
				</div>
				<!-- /.card-body -->
				<div class="card-footer">

				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
		</div>
	</div> <!-- / .row -->
</section>
<!-- /.content -->
@endsection
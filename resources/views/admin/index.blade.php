@extends('layouts.admin')
@section('content')
{{-- @dd(auth()->user()->notifications()->delete()) --}}
<div class="col-12 py-2 px-3 row">
	@can('viewAny',\App\Models\User::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">المستخدمين</h6>
			<h6 class="font-3">{{\App\Models\User::where('power', 'USER')->count()}}</h6>
		</div>
	</div>
</div>
@endcan
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-bells font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الإشعارات</h6>
			<h6 class="font-3">{{auth()->user()->unreadNotifications->count()}}</h6>
		</div>
	</div>
</div>
@can('viewAny',\App\Models\Article::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-books font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الدول</h6>
			<h6 class="font-3">{{\App\Models\Country::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Category::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-tag font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الأقسام</h6>
			<h6 class="font-3">{{\App\Models\Category::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\HubFile::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-file font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الملفات</h6>
			<h6 class="font-3">{{\App\Models\HubFile::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Menu::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-list font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">المتاجر</h6>
			<h6 class="font-3">{{\App\Models\Store::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Page::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-file-invoice font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الاشتراكات</h6>
			<h6 class="font-3">{{\App\Models\Package::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Contact::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-phone font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">عملـيات الشـراء</h6>
			<h6 class="font-3">{{\App\Models\Subscription::whereNot('price', 0)->count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Announcement::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-bullhorn font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الإعلانات</h6>
			<h6 class="font-3">{{\App\Models\Announcement::count()}}</h6>
		</div>
	</div>
</div>
@endcan

<div class="col-12 px-2 pb-2">
	<div style="height: 4px ;background: #0194fe;border-radius: 7px;transition: width .5s ease-in-out;width: 0%;" id="home-dashboard-divider"></div>
</div>
<livewire:dashboard-statistics />
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#home-dashboard-divider').css('width','40%');
</script>
@endpush

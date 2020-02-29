@can('manage_university_ids')
<li class="{{(request()->is('admin/university-ids*')) ? 'active' : '' }}">
    <a href="/admin/university-ids">
        <i class="fa fa-user"></i> University Ids </a>
</li>
@endcan
@can('manage_options')
<li class="{{(request()->is('admin/options*')) ? 'active' : '' }}">
    <a href="/admin/options">
        <i class="fa fa-cogs"></i> Options </a>
</li>
@endcan
@can('manage_members')
<li class="{{(request()->is('admin/members*')) ? 'active' : '' }}">
    <a href="/admin/members">
        <i class="fa fa-users"></i> Members </a>
</li>
@endcan
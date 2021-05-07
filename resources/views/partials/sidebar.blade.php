<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							{{Auth::User()->name}}
							<span class="user-level">Administrator</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="{{route('admin.home')}}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#userManagement" class="collapsed" aria-expanded="false">
						<i class="fas fa-users"></i>
						<p>User Management</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="userManagement" style="">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('admin.users.index')}}">
									<span class="sub-item">Users</span>
								</a>
							</li>
							<li>
								<a href="{{route('admin.roles.index')}}">
									<span class="sub-item">Roles</span>
								</a>
							</li>
							<li>
								<a href="{{route('admin.permissions.index')}}">
									<span class="sub-item">Permissions</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->
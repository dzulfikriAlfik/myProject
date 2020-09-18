// MODAL CONTROLLER MENU METHOD TAMBAH + EDIT MENU
$(function () {

	// button tambah controller menu 
	$('.addButton').on('click', function () {
		$('#formModalLabel').html('Add New Menu');
		$('.modal-footer button[type=submit]').html('Add');
		$('#menu').val('');
	});

	// button edit controller menu 
	$('.editButton').on('click', function () {

		$('#formModalLabel').html('Edit Menu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/latihan/wpu-login/menu/menuEdit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/latihan/wpu-login/menu/getEditMenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#menu').val(data.menu);
				$('#id').val(data.id);
			}
		});

	});

});

// MODAL CONTROLLER SUBMENU METHOD TAMBAH + EDIT SUBMENU
$(function () {

	// button tambah controller submenu
	$('.addButtonSubmenu').on('click', function () {
		$('#formModalLabel').html('Add New Submenu');
		$('.modal-footer button[type=submit]').html('Add');
		$('#title').val('');
		$('#menu_id').val('');
		$('#url').val('');
		$('#icon').val('');
		$('#is_active').checked;
	});

	// button edit controller menu 
	$('.editButtonSubmenu').on('click', function () {

		$('#formModalLabel').html('Edit Submenu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/latihan/wpu-login/menu/subMenuEdit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/latihan/wpu-login/menu/getEditSubMenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#is_active').checked;
			}
		});

	});

});

// MODAL CONTROLLER ADMIN/ROLE METHOD TAMBAH + EDIT ROLE
$(function () {

	// button tambah controller admin/role 
	$('.addRole').on('click', function () {
		$('#formModalLabel').html('Add New Role');
		$('.modal-footer button[type=submit]').html('Add');
		$('#role').val('');
	});

	// button edit controller admin/role/editRole 
	$('.editRole').on('click', function () {

		$('#formModalLabel').html('Edit Role');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/latihan/wpu-login/admin/roleEdit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/latihan/wpu-login/admin/getEditRole',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#role').val(data.role);
			}
		});

	});
});

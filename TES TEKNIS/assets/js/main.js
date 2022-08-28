$(".login-form").validate({
	rules: {
		email: {
			email: true,
			required: true,
			remote: {
				url: baseUrl + "/login/checkEmail",
				type: "post",
				data: {
					email: function () {
						return $(".email").val();
					},
				},
			},
		},
		password: {
			required: true,
			remote: {
				url: baseUrl + "/login/checkPassword",
				type: "post",
				data: {
					email: function () {
						return $(".email").val();
					},
					password: function () {
						return $(".password").val();
					},
				},
			},
		},
	},
	messages: {
		email: {
			required: "Email tidak boleh kosong",
			remote: "Email tidak ditemukan",
			email: "Format email salah",
		},
		password: {
			required: "Password tidak boleh kosong",
			remote: "Password salah",
		},
	},
	errorPlacement: function (label, element) {
		label.addClass("arrow");
		label.insertAfter(element);
	},
	wrapper: "span",
});

let formLogin = $(".login-form");
$(".login-form").on("submit", (e) => {
	// alert('asd')
	e.preventDefault();
	if (formLogin.valid()) {
		let data = formLogin.serialize();
		$.ajax({
			type: "POST",
			url: baseUrl + "/login/auth",
			data: data,
			success: function (data) {
				const Toast = Swal.mixin({
					toast: true,
					position: "top-end",
					showConfirmButton: false,
					timer: 1000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener("mouseenter", Swal.stopTimer);
						toast.addEventListener("mouseleave", Swal.resumeTimer);
					},
				});

				if (data != "true") {
					return Toast.fire({
						icon: "error",
						title: "Login tidak berhasil",
					});
				}

				Toast.fire({
					icon: "success",
					title: "Login berhasil",
				}).then((result) => {
					window.location.href = baseUrl + "dashboard";
				});
			},
			error: function (request, status, error) {
				console.log(request.responseText);
			},
		});
	}
});

// validasi tambah pegawai
$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" }); //for all select having class .chosen-select
$("#tambah-pegawai").validate({
	rules: {
		nip: {
			required: true,
			remote: {
				url: baseUrl + "/pegawai/checkNip",
				type: "post",
				data: {
					nip: function () {
						return $("#nip").val();
					},
				},
			},
		},
		nama: {
			required: true,
		},
		tempat_lahir: {
			required: true,
		},
		alamat: {
			required: true,
		},
		// jenis_kelamin: {
		// 	required: true,
		// },
		tanggal_lahir: {
			required: true,
		},
		golongan: {
			required: true,
		},
		eselon: {
			required: true,
		},
		id_jabatan: {
			required: true,
		},
		tempat_tugas: {
			required: true,
		},
		id_agama: {
			required: true,
		},
		unit_kerja: {
			required: true,
		},
		no_telp: {
			required: true,
		},
		foto: {
			required: true,
		},
		npwp: {
			required: true,
		},
	},
	messages: {
		nip: {
			required: "NIP tidak boleh kosong",
			remote: "NIP SUDAH DIGUNAKAN",
		},
		nama: "Nama tidak boleh kosong",
		tempat_lahir: "Tempat lahir tidak boleh kosong",
		alamat: "Alamat tidak boleh kosong",
		// jenis_kelamin: "Jenis kelamin tidak boleh kosong",
		tanggal_lahir: "Tanggal lahir tidak boleh kosong",
		golongan: "Golongan tidak boleh kosong",
		eselon: "Eselon tidak boleh kosong",
		id_jabatan: "Jabatan tidak boleh kosong",
		tempat_tugas: "Tempat tugas tidak boleh kosong",
		id_agama: "Agama tidak boleh kosong",
		unit_kerja: "Unit kerja tidak boleh kosong",
		no_telp: "No telepon tidak boleh kosong",
		foto: "Foto tidak boleh kosong",
		npwp: "NPWP tidak boleh kosong",
	},
	errorPlacement: function (error, element) {
		if (element.attr("name") == "operations") {
			error.insertAfter("#operations_chosen");
		} else {
			error.insertAfter(element);
		}
	},
});

// tambah pegawai
let tambah = $("#tambah-pegawai");
$("#tambah-pegawai").on("submit", function (e) {
	e.preventDefault();
	if (tambah.valid()) {
		Swal.fire({
			title: "Pastikan Data Sudah Benar",
			text: "",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya!",
			cancelButtonText: "Tidak!",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: baseUrl + "pegawai/tambah_data",
					type: "POST",
					data: new FormData(this),
					processData: false,
					cache: false,
					contentType: false,
					success: function (data) {
						if (data == "success") {
							Swal.fire("Data pegawai berhasil ditambah", "", "success").then(
								(result) => {
									location.reload();
								}
							);
						} else if (data == "error") {
							Swal.fire("Format foto tidak sesuai", "", "error");
						} else {
							Swal.fire("Gagal menambah data", "", "error");
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						Swal.fire("Gagal Menambah Data", "", "error");
					},
				});
			}
		});
	}
});

function deleteData(id) {
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data akan dihapus permanen!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: baseUrl + "pegawai/deleteData/" + id,
				type: "post",
				success: function (data) {
					if (data == "success") {
						Swal.fire("Deleted!", "Data berhasil dihapus", "success").then(
							(result) => {
								location.reload();
							}
						);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					Swal.fire("Gagal Menghapus Data", "", "error");
				},
			});
		}
	});
}

// validasi update pegawai
$("#update-pegawai").validate({
	rules: {
		nama: {
			required: true,
		},
		tempat_lahir: {
			required: true,
		},
		alamat: {
			required: true,
		},
		tanggal_lahir: {
			required: true,
		},
		golongan: {
			required: true,
		},
		eselon: {
			required: true,
		},
		id_jabatan: {
			required: true,
		},
		tempat_tugas: {
			required: true,
		},
		id_agama: {
			required: true,
		},
		unit_kerja: {
			required: true,
		},
		no_telp: {
			required: true,
		},
		npwp: {
			required: true,
		},
	},
	messages: {
		nama: "Nama tidak boleh kosong",
		tempat_lahir: "Tempat lahir tidak boleh kosong",
		alamat: "Alamat tidak boleh kosong",
		tanggal_lahir: "Tanggal lahir tidak boleh kosong",
		golongan: "Golongan tidak boleh kosong",
		eselon: "Eselon tidak boleh kosong",
		id_jabatan: "Jabatan tidak boleh kosong",
		tempat_tugas: "Tempat tugas tidak boleh kosong",
		id_agama: "Agama tidak boleh kosong",
		unit_kerja: "Unit kerja tidak boleh kosong",
		no_telp: "No telepon tidak boleh kosong",
		npwp: "NPWP tidak boleh kosong",
	},
});

// update pegawai
let update = $("#update-pegawai");
$("#update-pegawai").on("submit", function (e) {
	e.preventDefault();
	if (update.valid()) {
		Swal.fire({
			title: "Pastikan Data Sudah Benar",
			text: "",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya!",
			cancelButtonText: "Tidak!",
		}).then((result) => {
			if (result.isConfirmed) {
				let nip = $("#nip").val();
				$.ajax({
					url: baseUrl + "pegawai/update_pegawai/" + nip,
					type: "POST",
					data: new FormData(this),
					processData: false,
					cache: false,
					contentType: false,
					success: function (data) {
						if (data == "success") {
							Swal.fire("Data pegawai berhasil diupdate", "", "success").then(
								(result) => {
									location.reload();
								}
							);
						} else if (data == "error") {
							Swal.fire("Format foto tidak sesuai", "", "error");
						} else {
							Swal.fire("Gagal menambah data", "", "error");
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						Swal.fire("Gagal Menambah Data", "", "error");
					},
				});
			}
		});
	}
});

// filter unit kerja
$("#filterUnitKerja").on("change", (e) => {
	e.preventDefault();
	let unitKerja = $("#filterUnitKerja").val();
	if (unitKerja != "") {
		$.ajax({
			url: baseUrl + "pegawai/filterUnitKerja/" + unitKerja,
			type: "POST",
			success: function (data) {
				$(".all-data-pegawai").addClass("d-none");
				if (data.length > 0) {
					let dataFiltered = JSON.parse(data).map((item) => {
						let viewPegawai = baseUrl + "pegawai/dataPegawai/" + item.id;
						// let deletePegawai = onclick(deleteData(item.id))
						return `
							<tr>
								<td>
									<a href='${viewPegawai}' class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fa fa-eye fa-sm text-white-50"></i></a>
									<a href="#" onclick=(deleteData(${item.id})) id="buttonDeletePegawai" class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash fa-sm text-white-50"></i></a>
								</td>
								<td>${item.nip}</td>
								<td>${item.nama}</td>
								<td>${item.tempat_lahir}</td>
								<td>${item.alamat}</td>
								<td>${item.tanggal_lahir}</td>
								<td>${item.jenis_kelamin}</td>
								<td>${item.golongan}</td>
								<td>${item.eselon}</td>
								<td>${item.nama_jabatan}</td>
								<td>${item.nama_provinsi}</td>
								<td>${item.nama_agama}</td>
								<td>${item.nama_unit_kerja}</td>
								<td>${item.no_telp}</td>
								<td>${item.npwp}</td>
							</tr>
						`;
					});

					$("#filtered").remove();

					$("#dataTable").append(
						'<tbody id="filtered">' + dataFiltered + "</tbody>"
					);
					$("a#buttonDeletePegawai").on("click", function () {
						deleteData(item.id);
					});
				} else {
					$("#dataTable").append(`<tbody id=\"filtered\">
					<tr><td colspan="15" class="text-center font-weight-bold">Data Tidak Ada</td></tr></tbody>`);
				}
			},
		});
	} else {
		$("#filtered").remove();
		$(".all-data-pegawai").removeClass("d-none");
	}
});

$("#logout").on("click", function () {
	Swal.fire({
		title: "Apakah anda ingin Logout?",
		text: "",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya!",
		cancelButtonText: "Tidak!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: baseUrl + "pegawai/logout",
				type: "POST",
				success: function (data) {
					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 1000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener("mouseenter", Swal.stopTimer);
							toast.addEventListener("mouseleave", Swal.resumeTimer);
						},
					});

					if (data == "true") {
						Toast.fire({
							icon: "success",
							title: "Logout berhasil",
						}).then((result) => {
							window.location.href = baseUrl + "login";
						});
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					Swal.fire("Gagal Logout", "", "error");
				},
			});
		}
	});
});

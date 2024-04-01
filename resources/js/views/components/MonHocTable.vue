<template>
  <div class="card">
    <div class="card-header pb-0">
      <div class="d-flex align-items-center">
        <div class="col-8">
          <h6>Danh sách môn học</h6>
        </div>
        <div class="col-2 ms-2"><argon-button color="success" size="sm" class="ms-auto" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Thêm môn học</argon-button>
        </div>
      </div>

    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên môn học</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số tiết LT</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số tiết TH</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lớp</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="monhoc, index  in listMonHoc">
              <td>
                <div class="d-flex px-2 py-1">

                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ monhoc.TenMH }}</h6>

                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{ monhoc.LT }}</p>
              </td>
              <td class="align-middle text-center">
                <p class="text-xs font-weight-bold mb-0">{{ monhoc.TH }}</p>
              </td>
              <td class="align-middle text-center">
                <p class="text-xs font-weight-bold mb-0">{{ monhoc.Lop }}</p>
              </td>
              <td class="align-middle">
                <span class="m-3"> <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                    data-toggle="tooltip" data-original-title="Edit class">Chỉnh sửa</a></span>
                <span class="m-3 "> <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                    data-toggle="tooltip" data-original-title="Delete class"
                    @click="btnDelete(monhoc.id)">Xóa</a></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm môn học</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
            <label for="example-text-input" class="form-control-label">Tên môn học</label>
            <input class="form-control" type="text" name="id" v-model="this.form.TenMH" />
          </div>

          <div class="">
            <label for="example-text-input" class="form-control-label">Số tiết LT</label>
            <input class="form-control" type="number" min="0" name="siso" v-model="this.form.LT" />
          </div>
          <div class="">
            <label for="example-text-input" class="form-control-label">Số tiết TH</label>
            <input class="form-control" type="number" min="0" name="siso" v-model="this.form.TH" />
          </div>
          <div class="">
            <label for="example-text-input" class="form-control-label">Ngày Thi</label>
            <input class="form-control" type="date" min="0" name="siso" v-model="this.form.NgayThi" />
          </div>
          <div class="">
            <label for="example-text-input" class="form-control-label">Ngày Thanh Toán</label>
            <input class="form-control" type="date" min="0" name="siso" v-model="this.form.NgayThanhToan" />
          </div>
          <div class="">
            <label for="example-text-input" class="form-control-label">Lớp</label>
            <input class="form-control" type="text" min="0" name="siso" v-model="this.form.Lop" />
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" @click="postMonHoc()">Lưu</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ArgonButton from "@/components/ArgonButton.vue";
import ArgonInput from "@/components/ArgonInput.vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
  name: "monhoc-table",
  components: {
    ArgonButton,
    ArgonInput
  },
  data() {
    return {
      listMonHoc: {},

      form: {
        TenMH: '',
        LT: 0,
        TH: '',
        Lop: null,
        NgayThi: null,
        NgayThanhToan: null,
        Lop:''
      },
    }
  },
  methods: {
    async getMonHoc() {
      let _THIS = this;
      await axios.get(this.API_URL + '/monhoc')
        .then(function (response) {

          _THIS.listMonHoc = response.data
        })
        .catch(function (err) {
          toast.error("Đã xảy ra lỗi", { theme: 'colored' })
        });
    },

    async postMonHoc() {
      let _THIS = this;
      await axios.post(this.API_URL + '/monhoc', this.form)
        .then(function () {
          toast.success("Thêm môn học thành công", { theme: 'colored' }),
            _THIS.form.TenMH = '',
            _THIS.form.LT = 1,
            _THIS.form.TH = 1,
            _THIS.form.NgayThi = null,
            _THIS.form.NgayThanhToan = null,
            _THIS.getMonHoc();
        })
        .catch(function (err) {
          toast.error("Đã xảy ra lỗi", { theme: 'colored' })
        });
    },

    async deleteMonHoc(id) {
      await axios.delete(this.API_URL + '/monhoc/' + id, )
        .then(function () {
          toast.success("Xóa môn học thành công", { theme: 'colored' })
        })
        .catch(function (err) {
          toast.error("Đã xảy ra lỗi", { theme: 'colored' })
        });
    },
    btnDelete(id) {

      this.$swal({
        title: 'Xóa môn học ',
        text: "Bạn sẽ không thể hoàn tác thao tác này",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Xóa',
        confirmButtonColor: '#00FFFF',
        cancelButtonText: 'Đóng',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteMonHoc(id)
          this.getMonHoc()
        }
      });
    },

  },
  mounted() {
    this.getMonHoc();
  },
};
</script>

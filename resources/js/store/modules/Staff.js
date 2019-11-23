import staffService from '../../service/Staff'

const state = {
  staffs: [],
  staff: {
    gambar_staff: '',
    nama_staff: '',
    jabatan_staff: ''
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.staffs = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setStaffForm(state, payload) {
    state.staff.gambar_staff = payload.gambar
    state.staff.nama_staff = payload.nama
    state.staff.jabatan_staff = payload.jabatan
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  staff: state => state.staff
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await staffService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await staffService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await staffService.find(id)
      context.commit('setStaffForm', res)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async update(context, payload) {
    try {
      let data = new FormData();
      data.append('gambar', payload.gambar)
      data.append('nama', payload.nama)
      data.append('jabatan', payload.jabatan)

      console.log(data)
      
      await staffService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await staffService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setStaffForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
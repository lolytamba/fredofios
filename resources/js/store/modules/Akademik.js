import akademikService from '../../service/Akademik'

const state = {
  akademiks: [],
  akademik: {
    gambar_akademik: '',
    judul_akademik: '',
    keterangan_akademik: ''
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.akademiks = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setAkademikForm(state, payload) {
    state.akademik.gambar_akademik = payload.gambar
    state.akademik.judul_akademik = payload.judul
    state.akademik.keterangan_akademik = payload.keterangan
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  akademik: state => state.akademik
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await akademikService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await akademikService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await akademikService.find(id)
      context.commit('setAkademikForm', res)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async update(context, payload) {
    try {
      let data = new FormData();
      data.append('gambar', payload.gambar)
      data.append('judul', payload.judul)
      data.append('keterangan', payload.keterangan)

      console.log(data)
      
      await akademikService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await akademikService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setAkademikForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
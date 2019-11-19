import non_akademikService from '../../service/NonAkademik'

const state = {
  nonakademiks: [],
  nonakademik: {
    gambar_nonakademik: '',
    judul_nonakademik: '',
    keterangan_nonakademik: '',
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.nonakademiks = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setNonAkademikForm(state, payload) {
    state.nonakademik.gambar_nonakademik = payload.gambar
    state.nonakademik.judul_nonakademik = payload.judul
    state.nonakademik.keterangan_nonakademik = payload.keterangan
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  nonakademik: state => state.nonakademik
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await non_akademikService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await non_akademikService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await non_akademikService.find(id)
      context.commit('setNonAkademikForm', res)
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
      
      await non_akademikService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await non_akademikService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setNonAkademikForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
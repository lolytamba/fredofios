import galeriService from '../../service/Galeri'

const state = {
  galeries: [],
  galeri: {
    gambar_galeri: '',
    judul_galeri: '',
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.galeries = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setGaleriForm(state, payload) {
    state.galeri.gambar_galeri = payload.gambar
    state.galeri.judul_galeri = payload.judul
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  galeri: state => state.galeri
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await galeriService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await galeriService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await galeriService.find(id)
      context.commit('setGaleriForm', res)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async update(context, payload) {
    try {
      const data = {
        gambar : payload.gambar,
        judul: payload.judul,
      }
      console.log(data)
      await galeriService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await galeriService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setCabangForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
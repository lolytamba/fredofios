import artikelService from '../../service/Artikel'

const state = {
  news_news: [],
  news: {
    gambar: '',
    judul: '',
    konten: '',
  },
  loading: true,
  error: null
}

const mutations = {
  setSource(state, payload) {
    state.news_news = payload
    state.loading = false
    state.error = null
  },

  setFailedAction(state, payload) {
    state.loading = false
    state.error = payload.error
  },

  setNewsForm(state, payload) {
    state.news.gambar = payload.gambar
    state.news.judul = payload.judul
    state.news.konten = payload.konten
  }
}

const getters = {
  error: state => state.error,
  loading: state => state.loading,
  news: state => state.news
}

const actions = {
  async get(context) {
    try {
      context.commit('setSource', await artikelService.get())
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async store(context, payload) {
    try {
      await artikelService.store(payload)
    } catch (err) {
      context.commit('setFailedStore', err)
    }
  },

  async edit(context, id) {
    try {
      console.log(id)
      const res = await artikelService.find(id)
      context.commit('setNewsForm', res)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async update(context, payload) {
    try {
      let data = new FormData();
      data.append('gambar', payload.gambar)
      data.append('judul', payload.judul)
      data.append('konten', payload.konten)

      console.log(data)
      
      await artikelService.update(payload.id, data)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  async delete (context, id) {
    try {
      await artikelService.delete(id)
    } catch (err) {
      context.commit('setFailedAction', err)
    }
  },

  resetForm(context) {
    context.commit('setNewsForm', {})
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
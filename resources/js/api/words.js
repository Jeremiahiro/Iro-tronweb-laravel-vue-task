import axios from 'axios';

const client = axios.create({
  baseURL: '/api',
});

export default {
  all(params) {
    return client.get('words', params);
  },
  find(id) {
    return client.get(`words/${id}`);
  },
  update(id, data) {
    return client.put(`words/${id}`, data);
  },
  delete(id) {
    return client.delete(`words/${id}`);
  },
};
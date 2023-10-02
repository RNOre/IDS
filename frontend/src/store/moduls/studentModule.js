import axios from "axios";

export const students = {
    state: () => {
        return {
            students: ''
        }
    },
    mutations: {
        setStudents(state, payload) {
            state.students = payload;
        },
        deleteStudent(state, payload) {
            const newState = state.students.filter(student => student.id != payload);
            state.students=newState;
        }
    },
    actions: {
        async getStudents({commit}) {
            try {
                await axios.get('http://localhost:8000/api/v1/students')
                    .then(resp => resp.data)
                    .then(resp => commit('setStudents', resp));
            } catch (e) {
                console.log(e);
            }
        },
        async deleteStudent({commit}, payload) {
            try {
                await axios.delete(`http://localhost:8000/api/v1/students/${payload}`)
                    .then(resp=>commit('deleteStudent', payload))
            } catch (e) {
                console.log(e)
            }
        }
    },
    getters: {
        getStudentsData(state) {
            return state.students;
        },
    }
}
export default {
    actions: {
        user: {
            getUsers: "getUsers",
            createUser: "createUser",
            updateUser: "updateUser",
        },
        student: {
            createStudent: "createStudent",
            getStudents: "getStudents"
        }
    },
    mutations: {
        user: {
            setUsers: "setUsers",
            setErrors: "setErrors",
        },
        student: {
            setStudents: "setStudents"
        }
    }
}
export default {
    actions: {
        user: {
            getUsers: "getUsers",
            createUser: "createUser",
            updateUser: "updateUser",
        },
        student: {
            createStudent: "createStudent",
            getStudents: "getStudents",
        },
        utility: {
            getUtilities: "getUtilities",
            updateUtility: "updateUtility",
        },
        application: {
            getApplications: "getApplications",
        }
    },
    mutations: {
        user: {
            setUsers: "setUsers",
            setErrors: "setErrors",
        },
        student: {
            setStudents: "setStudents"
        },
        utility: {
            setUtilities: "setUtilities"
        },
        application: {
            setApplications: "setApplications"
        }
    }
}
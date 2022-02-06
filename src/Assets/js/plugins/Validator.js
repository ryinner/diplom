export default class {
    static validEmail(email) {
        const emailReguldar = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return emailReguldar.test(email)
    }

    static validName(name) {
        const nameRegular = /^[А-ЯЁ-]+$/i
        return nameRegular.test(name)
    }

    static validLogin(login) {
        const loginRegular = /^[\w]/i
        return loginRegular.test(login)
    }

    static validPhone(phone) {
        const phoneRegular = /^[0-9]{9,}/i
        return phoneRegular.test(phone)
    }

    static onlyNumbers(value) {
        const onlyNumbers = /[^0-9]/g
        return value.replace(onlyNumbers, '')
    }

    static mediumPasswordDifficult (password) {
        const medium = /[0-9А-ЯA-Z]{8,}/i
        const hard = /[~!#$%\^&*+=\-\[\]\\;,/{}|\\@:<>\?]/i

        if (medium.test(password) && hard.test(password)) {
            return true
        } else {
            return false
        }
    }
}
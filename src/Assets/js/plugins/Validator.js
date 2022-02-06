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
        const loginRegular = /[\w]/i
        return loginRegular.test(login)
    }

    static onlyNumbers(value) {
        const onlyNumbers = /[^0-9]/g
        return value.replace(onlyNumbers, '')
    }

    static mediumPasswordDifficult (password) {
        const medium_first = /[А-ЯA-Z]{9,}/i
        const medium_second = /[0-9]{9,}/i

        if (medium_first.test(password) && medium_second.test(password)) {
            return true;
        } else {
            return false;
        }
    }

    static hardPasswordDifficult (password) {
        const hard = /[~!#$%\^&*+=\-\[\]\\;,/{}|\\@:<>\?]/i

        return hard.test(password)
    }
}
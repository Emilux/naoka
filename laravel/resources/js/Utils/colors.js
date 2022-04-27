export const hoverColor = (color) => {
    switch (color) {
        case 'blue':
            return 'hover:bg-naoka-blue-hover transition-colors'
        case 'purple':
            return 'hover:bg-naoka-purple-hover transition-colors'
        case 'yellow':
            return 'hover:bg-naoka-yellow-hover transition-colors'
        case 'white-blue':
            return 'hover:bg-white-hover bg-white transition-colors'
        case 'white-yellow':
            return 'hover:bg-white-hover bg-white transition-colors'
        case 'white-purple':
            return 'hover:bg-white-hover bg-white transition-colors'
        default:
            return 'hover:text-naoka-purple-hover'
    }
}
export const contentColor = (color) => {
    switch (color) {
        case 'blue':
            return 'bg-naoka-blue text-white'
        case 'purple':
            return 'bg-naoka-purple text-white'
        case 'yellow':
            return 'bg-naoka-yellow text-naoka-purple'
        case 'white-blue':
            return 'bg-white text-naoka-blue'
        case 'white-yellow':
            return 'bg-white text-naoka-yellow'
        case 'white-purple':
            return 'bg-white text-naoka-purple'
        default:
            return 'text-naoka-purple'
    }
}
export const invertedColor = (color) => {
    switch (color) {
        case 'blue':
            return 'white-blue'
        case 'purple':
            return 'yellow'
        case 'yellow':
            return 'purple'
        case 'white-blue':
            return 'blue'
        case 'white-yellow':
            return 'yellow'
        case 'white-purple':
            return 'purple'
        default:
            return 'text-naoka-purple'
    }
}
export const puddlesColor = (color) => {
    switch (color) {
        case 'white-blue':
        case 'blue':
            return {normal:'#00A0A8',shadowed:'#00949B'}
        case 'white-purple':
        case 'purple':
            return {normal:'#412365',shadowed:'#3B205B'}
        case 'white-yellow':
        case 'yellow':
            return {normal:'#FED766',shadowed:'#FED148'}
        default:
            return {normal:'#00949B',shadowed:'#00A0A8'}
    }
}

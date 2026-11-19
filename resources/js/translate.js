export function translate(message) {
    return globalThis.window?.coolifyTranslations?.[message] ?? message;
}

export default function format(number, locale, currency, style = "currency") {
  return new Intl.NumberFormat(locale, {
    style,
    currency,
  }).format(number);
}

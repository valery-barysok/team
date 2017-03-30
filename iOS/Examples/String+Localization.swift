import Foundation

public extension String {

    /**
     method returns localized string with default comment and self name

     - returns: localized string
     */
    public func localized() -> String {
        return NSLocalizedString(self, comment: "")
    }

}
